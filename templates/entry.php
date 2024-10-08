<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Wownet community</title>
		<link rel="shortcut icon" href="/images/icon.ico">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/blog.css">
	</head>

	<body>
		<header>
			<?php
				if(!include_once("/usr/local/www/nginx/includes/image.php")) {
					echo "<center> SOMETHING WENT WRONG! </center>";
				}

				$root = "/usr/local/www/nginx/";
				$path = "/images/headers/";

				$headerArray = getImagesFromDir($root . $path);
				$randomImage = getRandomFromArray($headerArray); 
			?><img src="<?php echo $path.$randomImage ?>" width="630" height="200"/>
		</header>

		<nav>
			<a href="/">Blog</a> /
			<a href="/articles">Articles</a> /
			<del>Image dashboard</del>
		</nav>

		<hr>
		<br>

		<div class="blog_article">
		<div class="blog_entry">
		<div class="blog_header">Server upgrade - 24/12/2015 14:56</div>
			<div class="blog_content">
				Our server upgraded. Now we have better operating system which can serve faster than Ubuntu Server, also moved into new web serving
				software which known for it's performance on tiny machines: nginx. Also moved to MariaDB from MySQL, probably better database software.
				Not know anything about performance on database softwares but MariaDB used by big companies and also has better license.
				Also RAM upgrade: moved to 2GB ram from 1GB ram. I hope we will see the improvence on performance of our server. Enough for now. Stay tuned!
			</div>
		</div>
		</div>

		<div class="blog_article">
		<div class="blog_entry">
		<div class="blog_header">This is for test - 06/12/2015 02:20</div>
			<div class="blog_content">
				I have to test blog for positions and things. Things like texts over texts etc. So, as you can see, this is just test entry.
				But I will give you some gift for reading this: convert the last thing before : to numbers of latin alphabet and use it for root
				folder in server as a html file. If you capable to understand this you can find your way. And I need to continue writing because
				both of my first entry and this is same length so I can't test them properly. 
			</div>
		</div>
		</div>

		<div class="blog_article">
		<div class="blog_entry">
		<div class="blog_header">Just starting. - 06/12/2015 02:00</div>
			<div class="blog_content">
				This is the opening blog post for wownet community server. The server will include web, irc, ftp, mail services in future.
				The main page of webpage will remain like that, as a blog for writing stage of development. Note that not all of the services
				can survive until the end. We will see. Our primary objective is webpage and irc. I hope machine not make so much sound.
			</div>
		</div>
		</div>

		<br>
		<hr>

		<footer>
			Build with love and lots of sleepless nights.
			<br>Only use with modern browsers and good screen resolutions. Didn't test so much.
		</footer>
	</body>
</html>
