<?PHP // $Id$ 
      // xmldb.php - created with Moodle 1.9.4+ (Build: 20090218) (2007101541)


$string['aftertable'] = '放在此資料表後：';
$string['back'] = '返回';
$string['backtomainview'] = '返回主視圖';
$string['binaryincorrectlength'] = '二進位資料欄位的長度不正確';
$string['cannotuseidfield'] = '不能插入\"id\" 欄位。因為它是一個自動編號的欄位';
$string['change'] = '更改';
$string['charincorrectlength'] = '字元欄位的長度不正確';
$string['check_bigints'] = '尋找不正確的資料庫整數';
$string['check_indexes'] = '尋找遺失的資料庫索引';
$string['checkbigints'] = '檢查長整數(Bigints)';
$string['checkindexes'] = '檢查索引';
$string['completelogbelow'] = '(查看下面搜尋的完整日誌)';
$string['confirmcheckindexes'] = '這個功能會搜尋您的Moodle伺服器上可能遺失的索引資料，並自動產生(但不會執行)所需的SQL指令以更新。產生後，您可以將它們複製到您的SQL客戶端中執行它們。<br /><br />我們建議您在搜尋遺失的索引前，確定是使用Moodle(1.8、1.9、2.x等）的最新版本(+)。<br /><br />這個功能並不在資料庫伺服器上執行任何操作(只讀取而已)，因此隨時都可以安全地執行。';
$string['confirmdeletefield'] = '您是否非常確信要刪除此欄位：';
$string['confirmdeleteindex'] = '您是否非常確信要刪除此索引：';
$string['confirmdeletekey'] = '您是否非常確信要刪除此鍵值：';
$string['confirmdeletesentence'] = '您是否非常確信要刪除此子句：';
$string['confirmdeletestatement'] = '您是否非常確信要刪除語句和全部相關的子句嗎：';
$string['confirmdeletetable'] = '您是否非常確信要刪除此表：';
$string['confirmdeletexmlfile'] = '您是否非常確信要刪除此文件：';
$string['confirmrevertchanges'] = '您是否非常確信要恢復對此所做的改變：';
$string['create'] = '建立';
$string['createtable'] = '建立資料表：';
$string['defaultincorrect'] = '不正確的預設值';
$string['delete'] = '刪除';
$string['delete_field'] = '刪除欄位';
$string['delete_index'] = '刪除索引';
$string['delete_key'] = '刪除鍵值';
$string['delete_sentence'] = '刪除子句';
$string['delete_statement'] = '刪除語句';
$string['delete_table'] = '刪除資料表';
$string['delete_xml_file'] = '刪除XML文件';
$string['down'] = '向下';
$string['duplicate'] = '複製';
$string['duplicatefieldname'] = '已存在一個同名的欄位';
$string['edit'] = '編輯';
$string['edit_field'] = '編輯欄位';
$string['edit_index'] = '編輯索引';
$string['edit_key'] = '編輯鍵值';
$string['edit_sentence'] = '編輯子句';
$string['edit_statement'] = '編輯語句';
$string['edit_table'] = '編輯資料表';
$string['edit_xml_file'] = '編輯XML文件';
$string['enumvaluesincorrect'] = '列舉型別(enum)欄位的值不正確';
$string['field'] = '欄位';
$string['fieldnameempty'] = '空的欄位名';
$string['fields'] = '欄位';
$string['filenotwriteable'] = '檔案不可寫';
$string['floatincorrectdecimals'] = '浮點數欄位的小數位數不正確';
$string['floatincorrectlength'] = '浮點數欄位的長度不正確';
$string['gotolastused'] = '移至上次使用的檔案';
$string['incorrectfieldname'] = '不正確的欄位名稱';
$string['index'] = 'Index';
$string['indexes'] = '索引';
$string['integerincorrectlength'] = '整數欄位的長度不正確';
$string['key'] = 'Key';
$string['keys'] = '鍵值';
$string['listreservedwords'] = '保留字清單<br/>（用來保持<a href=\"http://docs.moodle.org/en/XMLDB_reserved_words\" target=\"_blank\">XMLDB保留字</a>的更新)';
$string['load'] = '載入';
$string['main_view'] = '主視圖';
$string['missing'] = '遺失的';
$string['missingfieldsinsentence'] = '子句中沒有欄位';
$string['missingindexes'] = '找到了遺失的索引';
$string['missingvaluesinsentence'] = '子句中沒有值';
$string['mustselectonefield'] = '您必須選擇一個欄位來查看與欄位相關的動作！';
$string['mustselectoneindex'] = '您必須選擇一個索引來查看與索引相關的動作！';
$string['mustselectonekey'] = '您必須選擇一個鍵值來查看與鍵值相關的動作！';
$string['new_statement'] = '新語句';
$string['new_table_from_mysql'] = '從MySQL建新資料表';
$string['newfield'] = '建立新欄位';
$string['newindex'] = '建立新索引';
$string['newkey'] = '建立新鍵值';
$string['newsentence'] = '建立新子句';
$string['newstatement'] = '建立新語句';
$string['newtable'] = '建立新資料表';
$string['newtablefrommysql'] = '從MySQL建新資料表';
$string['nomissingindexesfound'] = '沒有找到遺失的索引，您的資料庫不需要更多操作。';
$string['numberincorrectdecimals'] = '數字欄位的小數位數不正確';
$string['numberincorrectlength'] = '數字欄位的長度不正確';
$string['reserved'] = '保留';
$string['reservedwords'] = '保留字';
$string['revert'] = '回復';
$string['revert_changes'] = '回復變更';
$string['save'] = '儲存';
$string['searchresults'] = '搜尋結果';
$string['selectaction'] = '選擇動作：';
$string['selectdb'] = '選擇資料庫：';
$string['selectfieldkeyindex'] = '選擇欄位 / 鍵 / 索引：';
$string['selectonecommand'] = '為了查看PHP程式碼，請在列表中選擇一個動作';
$string['selectonefieldkeyindex'] = '為了查看PHP程式碼，請在列表中選擇一個欄位/鍵/索引';
$string['selecttable'] = '選擇資料表：';
$string['sentences'] = '子句';
$string['statements'] = '語句';
$string['statementtable'] = '語句表：';
$string['statementtype'] = '語句類型：';
$string['table'] = '資料表';
$string['tables'] = '資料表';
$string['test'] = '測試';
$string['textincorrectlength'] = '文字欄位的長度不正確';
$string['unload'] = '卸除';
$string['up'] = '向上';
$string['view'] = '檢視';
$string['view_reserved_words'] = '檢視保留字';
$string['view_structure_php'] = '檢視';
$string['view_structure_sql'] = '檢視';
$string['view_table_php'] = '檢視';
$string['view_table_sql'] = '檢視';
$string['viewedited'] = '檢視';
$string['vieworiginal'] = '檢視';
$string['viewphpcode'] = '檢視PHP程式碼';
$string['viewsqlcode'] = '檢視SQL語法';
$string['wrong'] = '錯誤';
$string['wrongdefaults'] = '發現錯誤的預設值';
$string['wrongints'] = '發現錯誤的整數資料';
$string['wronglengthforenum'] = '列舉(enum)欄位的長度不正確';
$string['wrongnumberoffieldsorvalues'] = '子句中欄位或值的數量不正確';
$string['wrongreservedwords'] = '目前使用的保留字<br/>（如果資料表名稱使用{$CFG->prefix}，就不用留意這個問題）';
$string['yesmissingindexesfound'] = '已經在您的資料庫中找到了一些遺失的索引資料。下面列出了關於它們的詳細情況以及建立它們的命令，您可以在SQL客戶端中執行它們。<br /><br />完成這個操作後，建議您重新執行這個工具，以確認沒有更多遺失的索引資料。';

?>
