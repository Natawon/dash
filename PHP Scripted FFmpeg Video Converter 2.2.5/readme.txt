

	PHP Scripted FFmpeg Video Converter 2.2.5 (64bit)
	by Kenny Svalgaard
	http://sye.dk/
	Released: 2018-May-16

	Versions included in this release:
	* FFmpeg 4.0 Win64 Static (2018-Apr-27)
	* PHP 7.2.5 64bit (2018-Apr-26) (VC15 x64 Non Thread Safe)
	* Microsoft Visual C++ 2017 Redistributable (x64) 14.12.25810

____________________________________________________________

IN THIS DOCUMENT

	* IN THIS DOCUMENT (You are here)
	* WHAT THIS TOOL DOES
	* NEWS IN THIS VERSION
	* INSTALLATION
	* HOW TO USE
	* REQUIREMENTS - VISUAL C++ RUNTIME LIBRARIES
	* FAQ / DEBUG / ERRORS
	* UPDATING FFMPEG
	* UPDATING THE PHP
	* CONFIGURING THE CONVERT CMD FILES
	* CONFIGURING SYSTEM SETTINGS
	* CONTACT
	* END USER LICENSE AGREEMENT / EULA

____________________________________________________________

WHAT THIS TOOL DOES

	This tool automatically converts video formats supported by FFmpeg, which is just about any. By default the tool is set to convert to mp4, but this can be configured in the settings file.

____________________________________________________________

NEWS IN THIS VERSION

	* Fix to handle when a video have "0/0" (or other weird stuff) as avg_frame_rate. Without this fix, the script would skip the video.
	* Fix to correctly process rotated video. Without this fix, the script would switch width and heitht on a video that was rotated 90 or 270 degrees.

	News from previous version:
	* Included latest current version of FFmpeg and PHP. Both are 64 bit only.
	* Included Visual C++ 2017 64bit Redistributable Package.
	* Removed unneeded 32bit function.
	* Moved ENCODING, WRITE_LOG and CLEAR_LOG_FILE options to a new settings.php file (system/settings.php).
	* Added option to change the logfile. This is also placed in the settings.php file (system/settings.php).

____________________________________________________________

INSTALLATION

	The PHP Scripted FFmpeg Video Converter is not installed, it simply runs from the directory where it is placed.
	However to use the script you must have the Visual C++ runtime libraries installed on your system. See the REQUIREMENTS section below.

____________________________________________________________

HOW TO USE

	Simply place video files in the defined DIR_IN directory (by default called "in"). Then start the script using one of the cmd files, like: "convert video to mp4 (default).cmd".
	The cmd files are also the configuration files. See the section called CONFIGURING THE CONVERT CMD FILES in this document for information.
	
	All videos (defined by the VIDEO_EXTENSIONS in settings) will be converted to mp4 and placed in the defined DIR_OUT directory (by default called "out").
	Any non video file will simply be moved to the defined DIR_OUT directory. If for some reason a converting fails, the video will be moved to DIR_FAILED.

	A mix of video, files and directories can be placed in the DIR_IN directory. The directory structure from the DIR_IN directory will be replicated to the DIR_OUT directory.

	By default all converted video will be named "[original name].mp4", which should be kept in mind when placing eg. files like this in the same directory in the DIR_IN:
		video_01.avi
		video_01.wmv
	The first of the two will be converted to video_01.mp4, but the second will be moved to existed, as the destination name will be the same. You can change this behaviour and have the script choose a new unique name instead of simply moving it.

	By default no files are deleted. If you want the script to delete the source file when done converting it, you must configure that in the settings. See the section called CONFIGURING THE CONVERT CMD FILES in this document for information.

____________________________________________________________

REQUIREMENTS

	* Windows 7 or newer, Windows Server 2008 R2 or newer.

	* Visual C++ Runtime Libraries
		The PHP scripting engine used in this tool, is build using Visual Studio 2017. Therefore you will need to have the Visual C++ runtime libraries installed.
		Try to run the script before installing Visual C++ runtime libraries - if it works, you already have it installed. If not I have included the Visual C++ Redistributable Package in the "system" directory.
		You can also download the package from Microsoft, here:

			https://support.microsoft.com/en-gb/help/2977003/the-latest-supported-visual-c-downloads

____________________________________________________________

FAQ / DEBUG / ERRORS

	Q: I'm getting an error saying "The program can't start because MSVCR120.dll is missing from your computer. Try reinstalling the program to fix this problem.".
	A: Install Visual C++ Redistributable Package. See link in the REQUIREMENTS section.

	Q: I have some videos that the script can't convert.
	A: There might be an error in the video file making the FFmpeg unable to convert the video, or the video might contain an unsupported codec. Try updat the FFmpeg component. See the UPDATING FFMPEG section for information on how to do that.
	   If the FFmpeg update did not solve the issue, then try add   -report   to the chosen settings in the FFMPEG_PARAMETERS section. This will make FFmpeg generate a report in the script folder, named like this: ffmpeg-20160420-210735.log. Inspect this log to see what is causing the issue.

	Q: Converting takes a long time.
	A: Yes it does - a faster computer will help.

____________________________________________________________

UPDATING FFMPEG

	To update the FFMPEG, download the latest 64bit static build, from the link below. Extract the package, and copy the "ffmpeg.exe" and "ffprobe.exe" from the "bin" directory to the system directory of the script, overwriting the current versions.

		http://ffmpeg.zeranoe.com/builds/

____________________________________________________________

UPDATING THE PHP

	If for some reason you want to update the PHP (it will not make the script run faster). You can then download the latest build from the link below.
	Normally you can choose between a "Thread Safe" and a "Non Thread Safe" version. So just a short note about that. Thread Safe means that PHP can run on a multi threaded web server where each thread will run in its own memory space, so that data from one thread will not collide with data from another thread.
	The way this tool uses PHP each instant already run in its own memory space, so you should get the Non Thread Safe version.
	There is also a choice between x86(32bit) and x64(64bit) versions. For this script you should get the x64 build.
	Download the package from the link below and extract the following three files to the system directory of the script, overwriting the existing: php.exe, ext\php_mbstring.dll, php7.dll.

	If you skipped the above: GET THE X64 NON THREAD SAFE:

		http://windows.php.net/download/

____________________________________________________________

CONFIGURING THE CONVERT CMD FILES

	The cmd files you start the script with, are also the configuration files. This makes it possible to have multiple configuration files for different purposes. Like the ones included.
	If you need another, simply make a copy of one of them, and edit as desired. Right click the file and choose Edit.
	
	In the convert*.cmd files there is a number of sections, each with a small description, an identifier and some settings.

	The identifiers is marked with < > signs, like this: < AN_IDENTIFIER >

	Below the identifier in each section, there is one or more settings, all starting with [ ], and ending with : followed by a description.
	Make sure not to include a : in the description, as everything before the last : in each line, will be used as setting.

	To use a setting it must be marked using x, like this: [x]
	Only one setting below each identifier can be marked.

	The settings for e.g. DIR_OUT looks like this:

		< DIR_OUT >
		[x] .\out\          : Default out directory.
		[ ] c:\video\out\   : Example.
		[ ]                 : Add custom setting before the colon, and move the x to this line to use the setting.

	If you want to change it to d:\iPad video\ it can then be done like this:

		< DIR_OUT >
		[ ] .\out\          : Default out directory.
		[ ] c:\video\out\   : Example.
		[x] d:\iPad video\  : Add custom setting before the colon, and move the x to this line to use the setting.

	or like this:

		< DIR_OUT >
		[x] d:\iPad video\  : My iPad videos go here

	Some settings, like < WRITE_LOG > do not have the last "Add custom setting before...". This is because only the listed options can be used.

		< WRITE_LOG >
		[x] true  : Set to have the script write a log.
		[ ] false : Set to have the script not write a log.

____________________________________________________________

CONFIGURING SYSTEM SETTINGS

	The following four configuration options is found in a file called settings.php, which is in the system directory in.
	If you need to change them, simply edit the settings.php file.

	ENCODING
	Set the encoding used on the system where the script runs.
	If any of the files placed in the "in" directory contains special or local characters, then you have to set the correct encoding used on the system.
	Universal Alphabet:        'utf-8'
	Western Alphabet:          'iso-8859-1'
	Central European Alphabet: 'iso-8859-2'
	Latin 3 Alphabet:          'iso-8859-3'
	Baltic Alphabet:           'iso-8859-4'
	Cyrillic Alphabet:         'iso-8859-5'
	Arabic Alphabet:           'iso-8859-6'
	Greek Alphabet:            'iso-8859-7'
	Hebrew Alphabet:           'iso-8859-8'
	Japanese:                  'shift-jis'
	Chinese Traditional:       'big5'

	WRITE_LOG
	Set whether or not to have the script write a log.
	Set to true to have the script write a log.
	Set to false to have the script not write a log.

	CLEAR_LOG_FILE
	Set whether or not to have the script clear the log each time the script is started.
	Set to true to cleared log file at each start of the script.
	Set to false to keep the current log and append to the end.

	LOG_FILE
	Set filepath for logfile. Use a relative path like './logfile', or an absolute like this: 'c:/convert/logfile.txt'.
	Make sure to use / (slash) and not \ (back-slash) in the path.

____________________________________________________________

CONTACT

	Please let me know if you find any bugs or having issues with the script.
	Also please let me know if you have any suggestions or settings that you think should be included in the script for next version.

	http://sye.dk/contact/

____________________________________________________________

END USER LICENSE AGREEMENT / EULA

	When used commercially a donation for at least 10$ must be made per system where it is used.
	For private non commercial use PHP Scripted FFmpeg Video Converter can be used for free.
	You are of cause still more than welcome to donate if you like the script, even though you only use it privately.

	Under no circumstances can PHP Scripted FFmpeg Video Converter or any part of it be distributed or sold, or be part of another work that is being distributed or sold.

	Test the script before donating - Donations are not refundable.
	Use the PayPal donate button on the page for donations:
	  http://sye.dk/convert/

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
	IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

____________________________________________________________
