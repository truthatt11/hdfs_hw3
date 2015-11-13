#!/bin/bash
BIN_PATH=/home/hadoopuser/hadoop/bin
$BIN_PATH/hdfs dfs -mkdir /files
$BIN_PATH/hdfs dfs -copyFromLocal ../files/input /files/input
$BIN_PATH/hadoop jar /home/hadoopuser/hadoop/share/hadoop/tools/lib/hadoop-streaming-2.6.1.jar \
             -mapper "python ../files/mapper.py" \
             -reducer "python ../files/reducer.py" \
             -input "/files/input" \
             -output "/log_outdir"
$BIN_PATH/hdfs dfs -copyToLocal  /log_outdir/* ../files/*
