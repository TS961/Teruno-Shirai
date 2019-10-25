<html>
	<head>
		<title>mission_3-5</title>
		<meta charset="utf-8">
	</head>
<body>


<?php
	$filename = "mission_3-5.txt";
			
	//取得情報を変数に
	
	$name = @$_POST['namae'];
	$name2 = @$_POST['namae2'];
	$comment = @$_POST['comment'];
	$comment2 = @$_POST['comment2'];
	$del = @$_POST['column'];
	$delbtn = @$_POST['del'];
	$edit = @$_POST['column2'];
	$editbtn = @$_POST['edit'];
	$edit2 = @$_POST['column3'];
	$editbtn2 = @$_POST['edit2'];
	$number = "";
	$date = date("Y/m/d H:i:s");
	$pw = @$_POST['pw'];
	$pwd = @$_POST['pwdel'];
	$pwe = @$_POST['pwedit'];
	
	
	//投稿番号の決定
	if (file_exists($filename)) {
    $number = explode("<>",file($filename)[count(file($filename))-1])[0]+1;
	} else {
    $number = 1;
	}
	$format = $number . "<>".$name."<>".$comment."<>".$date."<>".$pw."<>";
	
	
	//編集
	if((!(empty($comment))) && $edit ){
		$toukou = file($filename);
		for($i=1;$i<=count($toukou);$i=$i+1){
			if(explode("<>",$toukou[($i-1)])[0]!=(intval($edit))){
				continue;
			}elseif((empty(explode("<>",$toukou[($i-1)])[4]))){
							echo "パスワードがないため編集できません";
							?>
						<form action = "mission_3-5.php" method = "POST">
							<input type = "text" name ="namae" value = "名前"><br/>
							<input type = "text" name ="comment" value = "コメント"><br/>
							<input type = "text" name ="pw" value = "パスワード"><br/>
							<input type = "submit" name = "btn" value ="送信">
							<hr>
							<input type = "number" name ="column" value = "0"><br/>
							<input type = "text" name ="pwdel" value = "パスワード"><br/>
							<input type = "submit" name = "del" value ="削除">
							<hr>
							<input type = "number" name ="column2" value = "0"><br/>
							<input type = "text" name ="pwedit" value = "パスワード"><br/>
							<input type = "submit" name = "edit" value ="編集">
						</form>
						<?php
						}elseif(explode("<>",$toukou[($i-1)])[0]==(intval($edit))  && (explode("<>",$toukou[($i-1)])[4] == ($pwe))){			
?>
				<form action = "mission_3-5.php" method = "POST">
					<input type = "text" name ="namae" value = "<?php echo explode("<>",$toukou[($i-1)])[1]; ?>"><br/>
					<input type = "text" name ="comment" value = "<?php echo explode("<>",$toukou[($i-1)])[2]; ?>"><br/>
					<input type = "text" name ="pw" value = "<?php echo explode("<>",$toukou[($i-1)])[4]; ?>"><br/>
				<input type = "submit" name = "btn" value ="送信">
					<hr>
					<input type = "number" name ="column" value = "0"><br/>
					<input type = "text" name ="pwdel" value = "パスワード"><br/>
				<input type = "submit" name = "del" value ="削除">
					<hr>
					<input type = "number" name ="column2" value = "0"><br/>
					<input type = "hidden" name ="column3" value = "<?php echo $edit; ?>">
					<input type = "text" name ="pwedit" value = "パスワード"><br/>
				<input type = "submit" name = "edit2" value ="編集">
				</form>

<?php
				
						}elseif((explode("<>",$toukou[($i-1)])[0]==(intval($edit))) && (explode("<>",$toukou[($i-1)])[4] != ($pwe))){
							echo "パスワードが違います";
							?>
						<form action = "mission_3-5.php" method = "POST">
							<input type = "text" name ="namae" value = "名前"><br/>
							<input type = "text" name ="comment" value = "コメント"><br/>
							<input type = "text" name ="pw" value = "パスワード"><br/>
							<input type = "submit" name = "btn" value ="送信">
							<hr>
							<input type = "number" name ="column" value = "0"><br/>
							<input type = "text" name ="pwdel" value = "パスワード"><br/>
							<input type = "submit" name = "del" value ="削除">
							<hr>
							<input type = "number" name ="column2" value = "0"><br/>
							<input type = "text" name ="pwedit" value = "パスワード"><br/>
							<input type = "submit" name = "edit" value ="編集">
						</form>
						<?php
				
						}else{
							echo "編集できません";
							?>
						<form action = "mission_3-5.php" method = "POST">
							<input type = "text" name ="namae" value = "名前"><br/>
							<input type = "text" name ="comment" value = "コメント"><br/>
							<input type = "text" name ="pw" value = "パスワード"><br/>
							<input type = "submit" name = "btn" value ="送信">
							<hr>
							<input type = "number" name ="column" value = "0"><br/>
							<input type = "text" name ="pwdel" value = "パスワード"><br/>
							<input type = "submit" name = "del" value ="削除">
							<hr>
							<input type = "number" name ="column2" value = "0"><br/>
							<input type = "text" name ="pwedit" value = "パスワード"><br/>
							<input type = "submit" name = "edit" value ="編集">
						</form>
						<?php
						}
		}
		}elseif($edit2){
			$toukou = file($filename);
			$fp2 = fopen($filename,"w");
			fclose($fp2);
			$fp = fopen($filename,"a");
			for($i=1;$i<=count($toukou);$i=$i+1){
				if((explode("<>",$toukou[($i-1)])[0]==(intval($edit2)))){
					$toukou[($i-1)]=$edit2 . "<>".$name."<>".$comment."<>".$date."<>".$pw."<>";
					fwrite($fp,$toukou[($i-1)]."\n");
				}else{
					fwrite($fp,$toukou[($i-1)]);
			}
			}
			fclose($fp);
			?>
			<form action = "mission_3-5.php" method = "POST">
				<input type = "text" name ="namae" value = "名前"><br/>
				<input type = "text" name ="comment" value = "コメント"><br/>
				<input type = "text" name ="pw" value = "パスワード"><br/>
				<input type = "submit" name = "btn" value ="送信">
				<hr>
				<input type = "number" name ="column" value = "0"><br/>
				<input type = "text" name ="pwdel" value = "パスワード"><br/>
				<input type = "submit" name = "del" value ="削除">
				<hr>
				<input type = "number" name ="column2" value = "0"><br/>
				<input type = "text" name ="pwedit" value = "パスワード"><br/>
				<input type = "submit" name = "edit" value ="編集">
			</form>
			<?php
			
		}elseif($del){
			$toukou = file($filename);
			if((empty(explode("<>",$toukou[($del-1)])[4]))){
					echo "パスワードがないため削除できません";
					?>
				<form action = "mission_3-5.php" method = "POST">
					<input type = "text" name ="namae" value = "名前"><br/>
					<input type = "text" name ="comment" value = "コメント"><br/>
					<input type = "text" name ="pw" value = "パスワード"><br/>
					<input type = "submit" name = "btn" value ="送信">
					<hr>
					<input type = "number" name ="column" value = "0"><br/>
					<input type = "text" name ="pwdel" value = "パスワード"><br/>
					<input type = "submit" name = "del" value ="削除">
					<hr>
					<input type = "number" name ="column2" value = "0"><br/>
					<input type = "text" name ="pwedit" value = "パスワード"><br/>
					<input type = "submit" name = "edit" value ="編集">
				</form>
				<?php
				}else{
					$fp2 = fopen($filename,"w");
					fclose($fp2);
					$fp = fopen($filename,"a");
					for($i=1;$i<=count($toukou);$i=$i+1){
					if(explode("<>",$toukou[($i-1)])[0]!=(intval($del))){
					fwrite($fp,$toukou[($i-1)]);
					}elseif((explode("<>",$toukou[($i-1)])[0]==(intval($del))) && (explode("<>",$toukou[($i-1)])[4] != ($pwd))){
					fwrite($fp,$toukou[($i-1)]);
					echo "パスワードが違います";
					}
				}
			
			fclose($fp);
			
			?>
			<form action = "mission_3-5.php" method = "POST">
				<input type = "text" name ="namae" value = "名前"><br/>
				<input type = "text" name ="comment" value = "コメント"><br/>
				<input type = "text" name ="pw" value = "パスワード"><br/>
				<input type = "submit" name = "btn" value ="送信">
				<hr>
				<input type = "number" name ="column" value = "0"><br/>
				<input type = "text" name ="pwdel" value = "パスワード"><br/>
				<input type = "submit" name = "del" value ="削除">
				<hr>
				<input type = "number" name ="column2" value = "0"><br/>
				<input type = "text" name ="pwedit" value = "パスワード"><br/>
				<input type = "submit" name = "edit" value ="編集">
			</form>
			<?php
			}

		}elseif(empty($name) || empty($comment)){
			?>
			<form action = "mission_3-5.php" method = "POST">
				<input type = "text" name ="namae" value = "名前"><br/>
				<input type = "text" name ="comment" value = "コメント"><br/>
				<input type = "text" name ="pw" value = "パスワード"><br/>
				<input type = "submit" name = "btn" value ="送信">
				<hr>
				<input type = "number" name ="column" value = "0"><br/>
				<input type = "text" name ="pwdel" value = "パスワード"><br/>
				<input type = "submit" name = "del" value ="削除">
				<hr>
				<input type = "number" name ="column2" value = "0"><br/>
				<input type = "text" name ="pwedit" value = "パスワード"><br/>
				<input type = "submit" name = "edit" value ="編集">
			</form>
			<?php

		}else{
			?>
			<form action = "mission_3-5.php" method = "POST">
				<input type = "text" name ="namae" value = "名前"><br/>
				<input type = "text" name ="comment" value = "コメント"><br/>
				<input type = "text" name ="pw" value = "パスワード"><br/>
				<input type = "submit" name = "btn" value ="送信">
				<hr>
				<input type = "number" name ="column" value = "0"><br/>
				<input type = "text" name ="pwdel" value = "パスワード"><br/>
				<input type = "submit" name = "del" value ="削除">
				<hr>
				<input type = "number" name ="column2" value = "0"><br/>
				<input type = "text" name ="pwedit" value = "パスワード"><br/>
				<input type = "submit" name = "edit" value ="編集">
			</form>
			<?php

			$fp = fopen($filename, "a");	
			fwrite($fp,$format."\n");
			fclose($fp);
			$toukou = file($filename);
			}
		
		
			$toukou = file($filename);
			for($i=0;$i<count($toukou);$i=$i+1){
?>
<hr>
<?php
			$bunkatsu = explode("<>",$toukou[$i]);
				echo $bunkatsu[0] . "<br>";
				echo $bunkatsu[1] . "<br>";
				echo $bunkatsu[2] . "<br>";
				echo $bunkatsu[3] . "<br>";
				
			}
?>


</body>
</html>