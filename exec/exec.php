<?php
shell_exec('hdfs dfs -mkdir files');
shell_exec('hdfs dfs -copyFromLocal ../files/input /files/input ');
shell_exec('hadoop jar /home/hadoopuser/hadoop/share/hadoop/tools/lib/hadoop-streaming-2.6.1.jar \
             -mapper "python ../files/mapper.py" \
             -reducer "python ../files/reducer.py" \
             -input "../input" \
             -output "/log_outdir"');
shell_exec('hdfs dfs -copyToLocal  /log_outdir/* ../files/*');
?>
