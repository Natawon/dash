<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>Edit Video</title>
 <meta name="keyword" content="video to gif, video shortener">
 <meta name="description" content="Convert video to gif or cut it out to shorter length">
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="main-area">
    <div id="header">
        <h1>Please upload your video to edit it!</h1>
        <p>Make sure that your uploaded file name is not containing any special characters and or white spaces! You can convert your video to gif or mp4 format with this tool. You can also cut the duration of your video.</p>
    </div>

        <form method="post" action="" enctype="multipart/form-data">
            <div id="form-contents">

                <label for="video_file">Video to Edit:</label> </br>
                <input id="video_file" type="file" name="user_video" value=""/></br>
                
                <label for="extension">Convert to:</label></br>
                <select name="extension" id="extension">
                    <option value="none">Default</option>
                    <option value="gif">gif</option>
                    <option value="mp4">mp4</option>
                    <!-- You can add other format here -->
                </select></br>
                <label for="start_from">Start From:</label></br>
                <input type="text" name="start_from" id="start_from" value="" placeholder="example: 00:02:21"/>
                </br>
                <label for="length">Length:</label></br>
                <input type="text" name="length" id="length" value="" placeholder="example: 10"/> seconds
                </br>
                <input type="submit" name="submit" value="Edit">
            </div>                
        </form>
</div>
</body>
</html>