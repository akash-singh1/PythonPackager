#!/bin/bash

cd "$( dirname "$0" )"
curl "http://happitopia.net/stats/appStart?directory=`pwd`"



open "http://happitopia.net/?src=app&directory=`pwd`"
