#!/bin/sh
# sync.sh by Sam Bisbee <sam@sbisbee.com>
#
# Released into the public domain. No warranty.
#
# Syncs files from the repo root up into the web root on the server. Makes life
# easier if you do this with pubkey auth instead of typing your password twice.

REMOTE_HOST='sbisbee.com'
REMOTE_ROOT='public_html/saggingcouch.com'

# Make sure we pull down any distrib files that we forgot to commit.
rsync -ave ssh $REMOTE_HOST:$REMOTE_ROOT/distrib/ distrib/

# Push
rsync -ave ssh --exclude buildTOC.js --exclude sync.sh --exclude .git --delete . $REMOTE_HOST:$REMOTE_ROOT
