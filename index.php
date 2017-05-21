<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<title>
			CS 313 Weekly Assignments
		</title>
	</head>
	<?php
		date_default_timezone_set('America/Denver');
		function date_mod($file)
		{
			if ($file == '')
			{
				echo '<span class="fno">Not yet Uploaded</span>';
			}
			else
			{
				echo '<span class="fyes">'.date ("M j, Y g:iA", filemtime($file)).'</span>';
			}
		}
		
		function vid_link($link)
		{
			if ($link == '')
			{
				echo '';
			}
			else
			{
				echo '<a href="'.$link.'" target="_blank">Video Link</a>';
			}
		}
	?>
	<body>
        <div id="hys"><a target="_blank" href="https://www.hostyour.space/"><img src="hyslogo-blue-square-new-new.png" width=32 height=32></a></div>
		<header>
            <a href="index.php">CS 313 Weekly Assignments</a>
		</header>
		<section>
			<table id="topics">
				<tr>
					<td class="title">Week #</td>
					<td class="title">Assignment</td>
<!--					<td class="title">Comments</td>-->
<!--					<td class="title">Teaching Presentation</td>-->
					<td class="noborder">Last Modified</td>
				</tr>
				<tr>
					<td class="week">1</td>
					<td class="topic"><a href="hello.html" target="_blank">Hello World</a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod('hello.html'); ?></td>
				</tr>
				<tr>
					<td class="week">2</td>
					<td class="topic"><a href="index.php" target="_blank">Homepage</a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod('index.php'); ?></td>
				</tr>
				<tr>
					<td class="week">3</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">4</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">5</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">6</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">7</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">8</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">9</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">10</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">11</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">12</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">13</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
				<tr>
					<td class="week">14</td>
					<td class="topic"><a href="" target="_blank"></a></td>
<!--					<td class="topic"></td>-->
<!--					<td class="topic"><?php vid_link(); ?></td>-->
					<td class="last"><?php date_mod(''); ?></td>
				</tr>
			</table>
		<br>
		</section>
		<footer>
            Copyright &copy; 2017 &middot; <a href="https://www.chriszitting.com" target="_blank">Chris Zitting</a>
            <br>Project supported by: <a href="https://www.hostyour.space" target="_blank">Host Your Space</a> &middot; <a href="https://github.com/Zitting-Christopher/CS313/tree/master/web" target="_blank">GitHub</a>
		</footer>
	</body>
</html>