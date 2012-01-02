/*
 * buildTOC.js
 *   by Sam Bisbee <sam@sbisbee.com>
 *   on 2012-01-02
 *
 * Released into the public domain without any warranties.
 *
 * Used on www.saggingcouch.com to build table of contents for pages from <h2>
 * and <h3> tags. Outputs the new HTML on stdout, following the Unix
 * Philosophy. Plus, it greatly decreases the chances you'll overwrite the
 * original file.
 *
 * Usage: node ./buildTOC.js fileToParse > outputFile
 */
var fs = require('fs');
var util = require('util');

var html;
var currPos;
var i;

var tocDivTag = '<div id="toc">';
var h2OpenTag = '<h2>';
var h2CloseTag = '</h2>';
var h3OpenTag = '<h3>';
var h3CloseTag = '</h3>';

/* 
 * Hierarchy of <h2> and <h3> tags to put into the TOC. Top level array is for
 * <h2>'s. Each array element is an object (node) with properties: 'text'
 * (string) and 'children' (array of <h3> tags with the same properties).
 */
var nodes = [];

/*
 * Stores the array index to the last node we inserted, allowing us to easily
 * give it children. We'd have to go more complicated if this wasn't such a
 * shallow tree (2 levels).
 */
var prevNode;

/*
 * Stores the position in the html array where to place the table of contents.
 * 'line' is the array index, 'pos' is the offset (num chars).
 */
var tocPos;

//returns the HTML for an <li>, including the link and optional closing tag
function makeListItemHTML(text, href, omitCloseTag) {
  return '<li><a href="' + href + '">' + text + '</a>' + ((omitCloseTag) ? '' : '</li>\n');
}

/*
 * Takes an array of nodes and returns the string representation of its HTML.
 */
function nodesToHTML(nodes) {
  return '\n<ul>' + nodes.reduce(reduceNodesToHTML) + '</ul>\n';
}

//Do not call this directly - use nodesToHTML() instead!
function reduceNodesToHTML(prevVal, currVal) {
  var buff = makeListItemHTML(currVal.text, currVal.href, true);

  //assumes first node doesn't have children
  //TODO don't make this assumption and instead proc any children
  if(typeof prevVal === 'object') {
    prevVal = makeListItemHTML(prevVal.text, prevVal.href);
  }

  if(currVal.children) {
    //TODO make this optional (cmd line arg)
    currVal.children.sort(function(a, b) {
      if(a.text === b.text) {
        return 0;
      }

      return (a.text < b.text) ? -1 : 1;
    });

    buff += nodesToHTML(currVal.children);
  }

  return prevVal + buff + '</li>\n';
}

//creates the node object, breaking the text out of the provided HTML
function makeNode(html, pos, openTag, closeTag) {
  var node = {
    text: html.substr(
      pos + openTag.length,
      html.length - openTag.length - closeTag.length - pos
    )
  };

  //the <h2> or <h3> tag's id
  node.targetID = node.text;

  //the <li><a>'s href attr that targets node.targetID
  node.href = '#' + encodeURIComponent(node.text);

  return node;
}

function setTagAttr(html, tag, key, val) {
  var pos = html.indexOf(tag) + tag.length - 1;
  var attr = ' ' + key + '="' + val + '"';

  return html.substr(0, pos) + attr + html.substr(pos);
}

//required arg(s)
if(!process.argv[2]) {
  throw 'No file name provided';
}

//read in the file to process
html = fs.readFileSync(process.argv[2], 'utf-8').split('\n');

//parse and store all of our tags/data
for(i in html) {
  if(!tocPos) {
    //we're still looking for the TOC <div>
    currPos = html[i].indexOf(tocDivTag);

    if(currPos >= 0) {
      tocPos = {
        line: i,
        pos: currPos + tocDivTag.length
      };
    }
  }
  else {
    //collecting titles
    currPos = html[i].indexOf(h2OpenTag);

    //parse and store <h2>
    if(typeof currPos === 'number' && currPos >= 0) {
      nodes.push(makeNode(html[i], currPos, h2OpenTag, h2CloseTag));

      prevNode = nodes.length - 1;

      html[i] = setTagAttr(html[i], h2OpenTag, 'id', nodes[nodes.length - 1].targetID);
    }
    else {
      //parse and store <h3>
      currPos = html[i].indexOf(h3OpenTag);

      if(typeof currPos === 'number' && currPos >= 0) {
        if(!nodes[prevNode].children) {
          nodes[prevNode].children = [];
        }

        nodes[prevNode].children.push(makeNode(html[i], currPos, h3OpenTag, h3CloseTag));

        html[i] = setTagAttr(
          html[i],
          h3OpenTag,
          'id',
          nodes[prevNode].children[nodes[prevNode].children.length - 1].targetID
        );
      }
    }
  }

  //cleanliness is next to no bugs
  currPos = null;
}

//build the HTML to be inserted, sorting <h3> children as we go
nodes = nodesToHTML(nodes);

//insert the HTML
html[tocPos.line] = html[tocPos.line].substr(0, tocPos.pos)
                    + nodes
                    + html[tocPos.line].substr(tocPos.pos + nodes.length);

//put the string back together and stdout it
console.log(html.join('\n'));
