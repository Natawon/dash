@start "PHP Scripted FFmpeg converter" .\system\php.exe -n -d extension=.\system\php_mbstring.dll -f .\system\convert.php "%~nx0" && exit

____________________________________________________________

	Settings file for PHP Scripted FFmpeg Video Converter 2.2.5
	See readme.txt for information on how to make configuration.

____________________________________________________________

Set the source directory path. The directory where you place the source video files, to be converted.

Can be set to a virtual path like the first default, or an exact like the second.
The path must end with a backslash.

< DIR_IN >
[x] .\in\				: Default in directory.
[ ] c:\video\in-folder\	: Example of an exact path.
[ ] 					: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set what to do with the source video file, when conversion completes successfully.

< CONVERT_SUCCESS_ACTION >
[ ] move	: Select to move source video file to DIR_DONE.
[x] delete	: Select to delete source file.

____________________________________________________________

Set what to do with the source video file, if conversion fails.

< CONVERT_FAILED_ACTION >
[ ] move	: Move source video file to DIR_FAILED.
[x] delete	: Delete source file.

____________________________________________________________

Set what to do when video is generated to DIR_OUT or files are being moved to DIR_OUT, and a file with same name already exists there.

< DIR_OUT_ACTION >
[ ] move		: Move source file to DIR_EXISTED.
[ ] rename		: Use a new unique name for destination file.
[ ] overwrite	: Overwrite destination file.
[x] delete		: Skip conversion/move and delete source file.

____________________________________________________________

Set the destination directory, where all converted videos are generated and files are moved to.
The path must end with a backslash.

< DIR_OUT >
[x] .\out\			: Default out directory.
[ ] c:\video\out\	: Example.
[ ] 				: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set what to do when files are being moved to DIR_DONE and a file with same name already exists there.

< DIR_DONE_ACTION >
[ ] rename		: Use a new unique name for destination file.
[ ] overwrite	: Overwrite destination file.
[x] delete		: Skip move and delete source file.

____________________________________________________________

Set the path of the directory, where the original video files are moved to after being converted.
The path must end with a backslash.

< DIR_DONE >
[x] .\done\		: Default done directory.
[ ] 			: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set what to do when files are being moved to DIR_EXISTED and a file with same name already exists there.

< DIR_EXISTED_ACTION >
[ ] rename		: Use a new unique name for destination file.
[ ] overwrite	: Overwrite destination file.
[x] delete		: Skip move and delete source file.

____________________________________________________________

Set the path of the directory, where source files are being moved to, if the destination already exists.
The path must end with a backslash.

< DIR_EXISTED >
[x] .\existed\	: Default existed directory.
[ ] 			: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set what to do when files are being moved to DIR_FAILED and a file with same name already exists:

< DIR_FAILED_ACTION >
[ ] rename		: Use a new unique name for destination file.
[ ] overwrite	: Overwrite destination file.
[x] delete		: Skip move and delete source file.

____________________________________________________________

Set the path of the directory, where source files are being moved to, if the conversion fails.
The path must end with a backslash.

< DIR_FAILED >
[x] .\failed\	: Default failed directory.
[ ] 			: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set the prefix that will be added before the number that is added to a file name if the option 'rename' have been selected.

< UNIQUE_PREFIX >
[x] -unique-	: Default prefix.
[ ] 			: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set the maximum width and height in pixels of converted videos.
If a source video is wider or higher than these numbers, the converted video is scaled down to this, while preserving aspect ratio.

< MAX_DIMENSIONS >
[ ] 1280 x 720		: Maximum for iPad 1
[x] 1920 x 1080		: Maximum for iPad 2, 3 and 4
[ ] 				: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Sets how the script chooses bit rate for destination video.
When video bit rate from source is not available the 'formula' bit rate will be used.

< VIDEO_BIT_RATE >
[ ] scale		: Scale the source bit rate down to fit destination video. If video is not scaled down, the bit rate will be unchanged from source.
[ ] formula		: Use BIT_RATE_FORMULA to calculate the bit rate for destination video.
[x] lowest		: Use the lowest bit rate of 'scale' and 'formula'.
[ ] source		: Keep source bit rate. Bit rate will be kept even if video dimension is scaled down.

____________________________________________________________

Some codec and/or containers can't contain video with format that are not even (divisible by two). Use this setting to have the script make sure to avoid issues.

< VIDEO_DIMENSIONS_EVEN >
[x] true	: Round video width and height to nearest even number.
[ ] false	: Leave width and height.

____________________________________________________________

When VIDEO_BIT_RATE is set to 'formula', 'lowest' or when video bit rate from source is not available, then this setting is used to calculate the destination video bit rate.
The default formulas below are quite simple. Taking medium as an example, the first three variables {width} * {height} * {fps} calculates the pixels per second. The last 0.09 is the bits per pixel factor, often just called bpp.

The following variables will be filled in by the script:
{width}		: Width in pixels for destination video.
{height}	: Height in pixels for destination video.
{fps}		: Frames per second. If no average frame rate is found in source video, the FRAME_RATE_DEFAULT will be used instead.

< BIT_RATE_FORMULA >
[ ] {width} * {height} * {fps} * 0.03	: Low bit rate.		For low motion video or streaming.	(a video at 1920 x 1080 with 25 fps will get a bit rate at 1555 kbps)
[ ] {width} * {height} * {fps} * 0.09	: Medium bit rate. 	For medium motion video.			(a video at 1920 x 1080 with 25 fps will get a bit rate at 4666 kbps)
[x] {width} * {height} * {fps} * 0.15	: High bit rate. 	For high motion video.				(a video at 1920 x 1080 with 25 fps will get a bit rate at 7776 kbps)
[ ] {width} * {height} * 25 * 0.09		: For cdg karaoke songs. Setting have no fps, as cdg files normally have a very high fps, so setting to 25 fixed.
[ ]										: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

If no average frame rate is found in source video, this frame rate is used for calculating 'formula' video bit rate.

< FRAME_RATE_DEFAULT >
[x] 25		: Default frame rate.
[ ]			: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set the audio bit rate.

< AUDIO_FIXED_BIT_RATE >
[ ]  96000	: Low quality for stereo.
[x] 128000	: Medium quality for stereo.
[ ] 192000	: High quality for stereo.
[ ]			: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Sets how the script chooses which bit rate to use for destination audio.
When audio bit rate from source video is not available the 'fixed' bit rate will be used.

< AUDIO_BIT_RATE >
[ ] source	: Keep original source audio bit rate.
[ ] fixed	: Always use AUDIO_FIXED_BIT_RATE.
[x] lowest	: Use the lowest bit rate of 'source' and 'fixed'.

____________________________________________________________

Set the extensions of files that should be treated as video.
The extensions must be entered in low case and with a comma between each.

< VIDEO_EXTENSIONS >
[x] asf, avi, mpeg, mpg, wmv, mkv, mp4, m4v, mp4v, flv, mov, ts, swf, f4v, rm, 3g2, 3gp2, gp, 3gpp		: Commonly used extensions for videos.
[ ] cdg							: cdg files for karaoke songs
[ ]								: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set the extensions of files that should be ignored by normal procedures. In each directory, when all other video and files have been moved, files with these extensions will be moved as the last to DIR_DONE.
The extensions must be entered in low case and with a comma between each.

< EXCLUDE_EXTENSIONS >
[x] mp3				: Used when combining cdg karaoke files with mp3, to make sure that the mp3 files are not being moved before the converting of the matching cdg file.
[ ]					: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set whether or not to use the EXCLUDE_EXTENSIONS.

< USE_EXCLUDE_EXTENSIONS >
[ ] true	: Use the EXCLUDE_EXTENSIONS.
[x] false	: Default. Do not use the EXCLUDE_EXTENSIONS.

____________________________________________________________

Set whether or not to have the script keep running. Terminate when done, or keep waiting for more to convert.

< KEEP_RUNNING >
[x] true	: Keep checking the DIR_IN directory for files each minute, after all files have been converted or moved.
[ ] false	: Terminate script when all files in the DIR_IN directory have been converted or moved.

____________________________________________________________

Set the parameter used by FFmpeg to convert the videos.
See the following link for description of FFmpeg: http://www.ffmpeg.org/

The following variables will be filled in by the script:
{from}			: The source file name including path. This should be set in quotation marks, like in the default setting.
{from_no_ext}	: The source file name including path without extension. This should be set in quotation marks, like in the default setting.
{to}			: The destination file name including path. This should be set in quotation marks, like in the default setting.
{width}			: Width in pixels for destination video.
{height}		: Height in pixels for destination video.
{videobit}		: Video bit rate for destination video.
{audiobit}		: Audio bit rate for destination video.

< FFMPEG_PARAMETERS >
[x] -i "{from}" -b:v {videobit} -vcodec libx264 -preset slow -vf scale={width}:{height} -threads 0 -b:a {audiobit} "{to}"	: Convert to mp4, auto select audio codec
[ ] -i "{from}" -c:v copy -c:a copy "{to}"	: Simple copy of video and audio to new file. Codecs used in source video must comply with destination format.
[ ] -i "{from}" -b:v {videobit} -vcodec libx264 -preset slow -vf scale={width}:{height} -threads 0 -acodec libvo_aacenc -b:a {audiobit} "{to}"	: Convert to mp4, force selection of audio codec
[ ] -i "{from}" -i "{from_no_ext}.mp3" -b:v {videobit} -vcodec libx264 -vf scale={width}:{height} -b:a {audiobit} -pix_fmt yuv420p "{to}"			: Merging cdg karaoke lyrics and mp3 to mp4
[ ] 						: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set whether or not to have the script generate screenshots of the successfully converted videos.

< GENERATE_SCREENSHOTS >
[x] true	: Generate screenshots.
[ ] false	: Do not generate screenshots.

____________________________________________________________

Set the parameter used by FFmpeg to generate screenshots. Screenshots are generated in jpg format and saved along with the video in the Out-directory.
See the following link for description of FFmpeg: http://www.ffmpeg.org/

The following variables will be filled in by the script:
{from}		: The source file name including path. This should be set in quotation marks, like in the default setting.
{to}		: The destination file name including path. This should be set in quotation marks, like in the default setting.
{time}		: The time in the video where the screenshot is taken. The time is set to 10% from the start of the video. If video duration is not found when probing video, then a fixed time at 10 sec will be set.

Make sure "-ss {time}" comes before "-i {from}" to speed up generation.

< FFMPEG_SCREENSHOT_PARAMETERS >
[x] -ss {time} -i "{from}" -f image2 -vframes 1 "{to}"		: Default setting for generating screenshot.
[ ] 														: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________

Set the extension to give destination files.

< DESTINATION_EXTENSION >
[x] mp4		: Default extension for mp4 video files
[ ] 		: Add custom setting before the colon, and move the x to this line to use the setting.

____________________________________________________________