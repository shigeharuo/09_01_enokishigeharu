<?php
//必ずsession_startは最初に記述
session_start(); // セッション開始

//現在のセッションIDを取得
$old_session_id = session_id(); // idの取得

//新しいセッションIDを発行（前のSESSION IDは無効）
session_regenerate_id(true); // id再生成&旧idを破棄trueで古いIDは利用できなくなる。

//新しいセッションIDを取得
$new_session_id = session_id(); // 新idの取得

//旧セッションIDと新セッションIDを表示
echo '<p>旧id' . $old_session_id . '</p>';
echo '<p>新id' . $new_session_id . '</p>';
