#!/bin/bash
date > ll.log
service apache2 reload >> ll.log
ls -l /var/www/html >> ll.log
