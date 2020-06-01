var SESSION_STATUS = Flashphoner.constants.SESSION_STATUS;
var STREAM_STATUS = Flashphoner.constants.STREAM_STATUS;
var MEDIA_DEVICE_KIND = Flashphoner.constants.MEDIA_DEVICE_KIND;
var localVideo;
var remoteVideo;
var constraints;
var previewStream;
var publishStream;
var currentVolumeValue = 50;
var currentGainValue = 50;
var statsIntervalID;
var intervalID;
var canvas;
var extensionId = "nlbaajplpmleofphigmgaifhoikjmbkg";

try {
    var audioContext = new (window.AudioContext || window.webkitAudioContext)();
} catch (e) {
    console.warn("Failed to create audio context");
}

function loadStats() {
    publishStream.getStats(function (stats) {
        if (stats && stats.outboundStream) {
            if(stats.outboundStream.videoStats) {
                $('#outVideoStatBytesSent').text(stats.outboundStream.videoStats.bytesSent);
                $('#outVideoStatPacketsSent').text(stats.outboundStream.videoStats.packetsSent);
                $('#outVideoStatFramesEncoded').text(stats.outboundStream.videoStats.framesEncoded);
            } else {
                $('#outVideoStatBytesSent').text(0);
                $('#outVideoStatPacketsSent').text(0);
                $('#outVideoStatFramesEncoded').text(0);
            }

            if(stats.outboundStream.audioStats) {
                $('#outAudioStatBytesSent').text(stats.outboundStream.audioStats.bytesSent);
                $('#outAudioStatPacketsSent').text(stats.outboundStream.audioStats.packetsSent);
            } else {
                $('#outAudioStatBytesSent').text(0);
                $('#outAudioStatPacketsSent').text(0);
            }
        }
    });
    previewStream.getStats(function (stats) {
        if (stats && stats.inboundStream) {
            if(stats.inboundStream.videoStats) {
                $('#inVideoStatBytesReceived').text(stats.inboundStream.videoStats.bytesReceived);
                $('#inVideoStatPacketsReceived').text(stats.inboundStream.videoStats.packetsReceived);
                $('#inVideoStatFramesDecoded').text(stats.inboundStream.videoStats.framesDecoded);
            } else {
                $('#inVideoStatBytesReceived').text(0);
                $('#inVideoStatPacketsReceived').text(0);
                $('#inVideoStatFramesDecoded').text(0);
            }

            if(stats.inboundStream.audioStats) {
                $('#inAudioStatBytesReceived').text(stats.inboundStream.audioStats.bytesReceived);
                $('#inAudioStatPacketsReceived').text(stats.inboundStream.audioStats.packetsReceived);
            } else {
                $('#inAudioStatBytesReceived').text(0);
                $('#inAudioStatPacketsReceived').text(0);
            }
        }
    });
}

function init_page() {
    //init api
    try {
        Flashphoner.init({
            screenSharingExtensionId: extensionId,
            flashMediaProviderSwfLocation: '../../../../media-provider.swf',
            mediaProvidersReadyCallback: function (mediaProviders) {
                //hide remote video if current media provider is Flash
                if (mediaProviders[0] == "Flash") {
                    $("#fecForm").hide();
                    $("#stereoForm").hide();
                    $("#sendAudioBitrateForm").hide();
                    $("#cpuOveruseDetectionForm").hide();
                }
                if (Flashphoner.isUsingTemasys()) {
                    $("#audioInputForm").hide();
                    $("#videoInputForm").hide();
                }
            }
        })
    } catch (e) {
        $("#notifyFlash").text("Your browser doesn't support Flash or WebRTC technology necessary for work of an example");
        return;
    }
    //local and remote displays
    localVideo = document.getElementById("localVideo");
    remoteVideo = document.getElementById("remoteVideo");
    canvas = document.getElementById("canvas");

    if(!Browser.isChrome() && !Browser.isFirefox()) {
        $('#screenShareForm').hide();
    }
    if (!Browser.isFirefox()) {
        $('#mediaSourceForm').hide();
    }

    setInterval(drawSquare, 2000);

    Flashphoner.getMediaDevices(null, true, MEDIA_DEVICE_KIND.OUTPUT).then(function (list) {
        list.audio.forEach(function (device) {
            var audio = document.getElementById("audioOutput");
            var i;
            var deviceInList = false;
            for (i = 0; i < audio.options.length; i++) {
                if (audio.options[i].value === device.id) {
                    deviceInList = true;
                    break;
                }
            }
            if (!deviceInList) {
                var option = document.createElement("option");
                option.text = device.label || device.id;
                option.value = device.id;
                audio.appendChild(option);
            }
        });
    }).catch(function (error) {
        $('#audioOutputForm').remove();
    });

    Flashphoner.getMediaDevices(null, true).then(function (list) {
        list.audio.forEach(function (device) {
            var audio = document.getElementById("audioInput");
            var i;
            var deviceInList = false;
            for (i = 0; i < audio.options.length; i++) {
                if (audio.options[i].value === device.id) {
                    deviceInList = true;
                    break;
                }
            }
            if (!deviceInList) {
                var option = document.createElement("option");
                option.text = device.label || device.id;
                option.value = device.id;
                audio.appendChild(option);
            }
        });
        list.video.forEach(function (device) {
            console.log(device);
            var video = document.getElementById("videoInput");
            var i;
            var deviceInList = false;
            for (i = 0; i < video.options.length; i++) {
                if (video.options[i].value === device.id) {
                    deviceInList = true;
                    break;
                }
            }
            if (!deviceInList) {
                var option = document.createElement("option");
                option.text = device.label || device.id;
                option.value = device.id;
                if (option.text.toLowerCase().indexOf("back") >= 0 && video.children.length > 0) {
                    video.insertBefore(option, video.children[0]);
                } else {
                    video.appendChild(option);
                }
            }
        });


        $("#url").val(setURL() + "/" + createUUID(8));

        //set initial button callback
        onStopped();

        if (list.audio.length === 0) {
            $("#sendAudio").prop('checked', false).prop('disabled', true);
        }
        if (list.video.length === 0) {
            $("#sendVideo").prop('checked', false).prop('disabled', true);
        }
    }).catch(function (error) {
        $("#notifyFlash").text("Failed to get media devices");
    });
    $("#receiveDefaultSize").click(function () {
        if ($(this).is(':checked')) {
            $("#receiveWidth").prop('disabled', true);
            $("#receiveHeight").prop('disabled', true);

        } else {
            $("#receiveWidth").prop('disabled', false);
            $("#receiveHeight").prop('disabled', false);
        }
    });
    $("#receiveDefaultBitrate").click(function () {
        if ($(this).is(':checked')) {
            $("#receiveMinBitrate").prop('disabled', true);
            $("#receiveMaxBitrate").prop('disabled', true);

        } else {
            $("#receiveMinBitrate").prop('disabled', false);
            $("#receiveMaxBitrate").prop('disabled', false);
        }
    });
    $("#receiveDefaultQuality").click(function () {
        if ($(this).is(':checked')) {
            $("#quality").prop('disabled', true);

        } else {
            $("#quality").prop('disabled', false);
        }
    });

    $("#micGainControl").slider({
        range: "min",
        min: 0,
        max: 100,
        value: currentGainValue,
        step: 10,
        animate: true,
        slide: function (event, ui) {
            currentGainValue = ui.value;
            if(publishStream) {
                publishStream.setMicrophoneGain(currentGainValue);
            }
        }
    });

    $("#volumeControl").slider({
        range: "min",
        min: 0,
        max: 100,
        value: currentVolumeValue,
        step: 10,
        animate: true,
        slide: function (event, ui) {
            currentVolumeValue = ui.value;
            previewStream.setVolume(currentVolumeValue);
        }
    }).slider("disable");

    $("#testBtn").text("Test").off('click').click(function () {
        $(this).prop('disabled', true);
        startTest();
    }).prop('disabled', false);

    $( "#audioOutput" ).change(function() {
        if (previewStream) {
            previewStream.setAudioOutputId($(this).val());
        }
    });
    if (!Browser.isChrome()) {
        $('#audioOutput').remove();
    }

    $("#videoInput").change(function() {
        if (publishStream) {
            publishStream.switchCam($(this).val());
        }
    });

    $("#audioInput").change(function() {
        if (publishStream) {
            publishStream.switchMic($(this).val());
        }
    });
}

function onStarted(publishStream, previewStream) {
    statsIntervalID = setInterval(loadStats, 2000);
    $('input:radio').attr("disabled", true);
    $("#publishBtn").text("Stop").off('click').click(function () {
        $(this).prop('disabled', true);
        clearInterval(statsIntervalID);
        previewStream.stop();
    }).prop('disabled', false);
    $("#switchBtn").text("Switch").off('click').click(function () {
        publishStream.switchCam().then(function(id) {
            $('#videoInput option:selected').prop('selected', false);
            $("#videoInput option[value='"+ id +"']").prop('selected', true);
        }).catch(function(e) {
            console.log("Error " + e);
        });
    }).prop('disabled', $('#sendCanvasStream').is(':checked'));
    $("#switchMicBtn").click(function (){
        publishStream.switchMic().then(function(id) {
            $('#audioInput option:selected').prop('selected', false);
            $("#audioInput option[value='"+ id +"']").prop('selected', true);
        }).catch(function(e) {
            console.log("Error " + e);
        });
    }).prop('disabled', !($('#sendAudio').is(':checked')));
    //enableMuteToggles(false);
    $("#volumeControl").slider("enable");
    previewStream.setVolume(currentVolumeValue);
    //intervalID = setInterval(function() {
    //    previewStream.getStats(function(stat) {
    //        if (stat.incomingStreams.audio && stat.incomingStreams.audio.audioOutputLevel > 100) {
    //            $("#talking").css('background-color', 'green');
    //        } else {
    //            $("#talking").css('background-color', 'red');
    //        }
    //    });
    //},250);

}

function onStopped() {
    publishStream = null;
    $('input:radio').attr("disabled", false);
    $("#publishBtn").text("Start").off('click').click(function () {
        if (validateForm()) {
            muteInputs();
            $(this).prop('disabled', true);
            start();
        }
    }).prop('disabled', false);
    $("#switchBtn").text("Switch").off('click').prop('disabled',true);
    $("#switchMicBtn").text("Switch").off('click').prop('disabled',true);
    unmuteInputs();
    $("#publishResolution").text("");
    $("#playResolution").text("");
    $("#volumeControl").slider("disable");
    clearInterval(intervalID);
    $("#testBtn").prop('disabled', false);
    //enableMuteToggles(false);
}

var micLevelInterval;
var testStarted;
var audioContextForTest;

function startTest() {
    if (Browser.isSafariWebRTC()) {
        Flashphoner.playFirstVideo(localVideo, true);
        Flashphoner.playFirstVideo(remoteVideo, false);
    }
    Flashphoner.getMediaAccess(getConstraints(), localVideo).then(function (disp) {
        $("#testBtn").text("Release").off('click').click(function () {
            $(this).prop('disabled', true);
            stopTest();
        }).prop('disabled', false);

        window.AudioContext = window.AudioContext || window.webkitAudioContext;
        if (Flashphoner.getMediaProviders()[0] == "WebRTC" && window.AudioContext) {
            for (i = 0; i < localVideo.children.length; i++) {
                if (localVideo.children[i] && localVideo.children[i].id.indexOf("-LOCAL_CACHED_VIDEO") != -1) {
                    var stream = localVideo.children[i].srcObject;
                    audioContextForTest = new AudioContext();
                    var microphone = audioContextForTest.createMediaStreamSource(stream);
                    var javascriptNode = audioContextForTest.createScriptProcessor(1024, 1, 1);
                    microphone.connect(javascriptNode);
                    javascriptNode.connect(audioContextForTest.destination);
                    javascriptNode.onaudioprocess = function (event) {
                        var inpt_L = event.inputBuffer.getChannelData(0);
                        var sum_L = 0.0;
                        for (var i = 0; i < inpt_L.length; ++i) {
                            sum_L += inpt_L[i] * inpt_L[i];
                        }
                        $("#micLevel").text(Math.floor(Math.sqrt(sum_L / inpt_L.length) * 100));
                    }
                }
            }
        } else if (Flashphoner.getMediaProviders()[0] == "Flash") {
            micLevelInterval = setInterval(function () {
                $("#micLevel").text(disp.children[0].getMicrophoneLevel());
            }, 500);
        }
        testStarted = true;
    }).catch(function (error) {
        $("#testBtn").prop('disabled', false);
        testStarted = false;
    });

    drawSquare();
}


function stopTest() {
    releaseResourcesForTesting();
    if (Flashphoner.releaseLocalMedia(localVideo)) {
        $("#testBtn").text("Test").off('click').click(function () {
            $(this).prop('disabled', true);
            startTest();
        }).prop('disabled', false);
    } else {
        $("#testBtn").prop('disabled', false);
    }
}

function releaseResourcesForTesting() {
    testStarted = false;
    clearInterval(micLevelInterval);
    if (audioContextForTest) {
        audioContextForTest.close();
        audioContextForTest = null;
    }
}

function start() {
    if (testStarted)
        stopTest();
    if (Browser.isSafariWebRTC()) {
        Flashphoner.playFirstVideo(localVideo, true);
        Flashphoner.playFirstVideo(remoteVideo, false);
    }
    //check if we already have session
    var url = $('#url').val();
    //check if we already have session
    if (Flashphoner.getSessions().length > 0) {
        var session = Flashphoner.getSessions()[0];
        if (session.getServerUrl() == url) {
            startStreaming(session);
            return;
        } else {
            //remove session DISCONNECTED and FAILED callbacks
            session.on(SESSION_STATUS.DISCONNECTED, function () {
            });
            session.on(SESSION_STATUS.FAILED, function () {
            });
            session.disconnect();
        }
    }

    console.log("Create new session with url " + url);
    Flashphoner.createSession({urlServer: url}).on(SESSION_STATUS.ESTABLISHED, function (session) {
        //session connected, start streaming
        startStreaming(session);
    }).on(SESSION_STATUS.DISCONNECTED, function () {
        setStatus(SESSION_STATUS.DISCONNECTED);
        onStopped();
    }).on(SESSION_STATUS.FAILED, function () {
        setStatus(SESSION_STATUS.FAILED);
        onStopped();
    });
}

function getConstraints() {
    constraints = {
        audio: $("#sendAudio").is(':checked'),
        video: $("#sendVideo").is(':checked'),
        customStream: $("#sendCanvasStream").is(':checked')
    };

    if (constraints.audio) {
        constraints.audio = {
            deviceId: $('#audioInput').val()
        };
        if ($("#fec").is(':checked'))
            constraints.audio.fec = $("#fec").is(':checked');
        if ($("#sendStereoAudio").is(':checked'))
            constraints.audio.stereo = $("#sendStereoAudio").is(':checked');
        if (parseInt($('#sendAudioBitrate').val()) > 0)
            constraints.audio.bitrate = parseInt($('#sendAudioBitrate').val());
    }

    if (constraints.video) {
        if (constraints.customStream) {
            constraints.customStream = canvas.captureStream(30);
            constraints.video = false;
        } else {
            constraints.video = {
                deviceId: $('#videoInput').val(),
                width: parseInt($('#sendWidth').val()),
                height: parseInt($('#sendHeight').val())
            };
            if (Browser.isSafariWebRTC() && Browser.isiOS() && Flashphoner.getMediaProviders()[0] === "WebRTC") {
                constraints.video.deviceId = {exact: $('#videoInput').val()};
            }
            if (parseInt($('#sendVideoMinBitrate').val()) > 0)
                constraints.video.minBitrate = parseInt($('#sendVideoMinBitrate').val());
            if (parseInt($('#sendVideoMaxBitrate').val()) > 0)
                constraints.video.maxBitrate = parseInt($('#sendVideoMaxBitrate').val());
            if (parseInt($('#fps').val()) > 0)
                constraints.video.frameRate = parseInt($('#fps').val());
        }
    }

    return constraints;
}

function startStreaming(session) {
    var streamName = field("url").split('/')[3];
    var constraints = getConstraints();
    var mediaConnectionConstraints;

    if (!$("#cpuOveruseDetection").is(':checked')) {
        mediaConnectionConstraints = {
            "mandatory": {
                googCpuOveruseDetection: false
            }
        }
    }
    publishStream = session.createStream({
        name: streamName,
        display: localVideo,
        cacheLocalResources: true,
        constraints: constraints,
        mediaConnectionConstraints: mediaConnectionConstraints,
        sdpHook: rewriteSdp
    }).on(STREAM_STATUS.PUBLISHING, function (publishStream) {
        $("#testBtn").prop('disabled', true);
        var video = document.getElementById(publishStream.id());
        //resize local if resolution is available
        if (video.videoWidth > 0 && video.videoHeight > 0) {
            resizeLocalVideo({target: video});
        }
        enableToggles(true);
        if ($("#muteVideoToggle").is(":checked")) {
            muteVideo();
        }
        if ($("#muteAudioToggle").is(":checked")) {
            muteAudio();
        }
        //remove resize listener in case this video was cached earlier
        video.removeEventListener('resize', resizeLocalVideo);
        video.addEventListener('resize', resizeLocalVideo);
        publishStream.setMicrophoneGain(currentGainValue);
        setStatus(STREAM_STATUS.PUBLISHING);
        //play preview
        var constraints = {
            audio: $("#playAudio").is(':checked'),
            video: $("#playVideo").is(':checked')
        };
        if (constraints.audio) {
            constraints.audio = {
                outputId: $('#audioOutput').val()
            }
        }
        if (constraints.video) {
            constraints.video = {
                width: (!$("#receiveDefaultSize").is(":checked")) ? parseInt($('#receiveWidth').val()) : 0,
                height: (!$("#receiveDefaultSize").is(":checked")) ? parseInt($('#receiveHeight').val()) : 0,
                bitrate: (!$("#receiveDefaultBitrate").is(":checked")) ? $("#receiveBitrate").val() : 0,
                quality: (!$("#receiveDefaultQuality").is(":checked")) ? $('#quality').val() : 0
            };
        }
        previewStream = session.createStream({
            name: streamName,
            display: remoteVideo,
            constraints: constraints
        }).on(STREAM_STATUS.PLAYING, function (previewStream) {
            document.getElementById(previewStream.id()).addEventListener('resize', function (event) {
                $("#playResolution").text(event.target.videoWidth + "x" + event.target.videoHeight);
                resizeVideo(event.target);
            });
            //enable stop button
            onStarted(publishStream, previewStream);
            //wait for incoming stream
            if (Flashphoner.getMediaProviders()[0] == "WebRTC") {
                setTimeout(function () {
                    detectSpeech(previewStream);
                }, 3000);
            }

            drawSquare();
        }).on(STREAM_STATUS.STOPPED, function () {
            publishStream.stop();
        }).on(STREAM_STATUS.FAILED, function () {
            //preview failed, stop publishStream
            if (publishStream.status() == STREAM_STATUS.PUBLISHING) {
                setStatus(STREAM_STATUS.FAILED);
                publishStream.stop();
            }
        });
        previewStream.play();
    }).on(STREAM_STATUS.UNPUBLISHED, function () {
        setStatus(STREAM_STATUS.UNPUBLISHED);
        //enable start button
        onStopped();
    }).on(STREAM_STATUS.FAILED, function () {
        setStatus(STREAM_STATUS.FAILED);
        //enable start button
        onStopped();
    });
    publishStream.publish();
}

function rewriteSdp(sdp) {
    var sdpStringFind = $("#sdpStringFind").val().replace('\\r\\n','\r\n');
    var sdpStringReplace = $("#sdpStringReplace").val().replace('\\r\\n','\r\n');
    if (sdpStringFind != 0 && sdpStringReplace != 0) {
        var newSDP = sdp.sdpString.toString();
        newSDP = newSDP.replace(new RegExp(sdpStringFind,"g"), sdpStringReplace);
        return newSDP;
    }
    return sdp.sdpString;
}

//show connection or local stream status
function setStatus(status) {
    var statusField = $("#streamStatus");
    statusField.text(status).removeClass();
    if (status == "PUBLISHING") {
        statusField.attr("class", "text-success");
    } else if (status == "DISCONNECTED" || status == "UNPUBLISHED") {
        statusField.attr("class", "text-muted");
    } else if (status == "FAILED") {
        statusField.attr("class", "text-danger");
    }
}

function muteInputs() {
    $(":text, :checkbox").each(function () {
        if ($(this).attr('id') !== 'audioOutput') {
            $(this).attr('disabled', 'disabled');
        }
    });
}

function unmuteInputs() {
    $(":text, select, :checkbox").each(function () {
        if ($(this).attr('id') == 'sendAudio' && $("#audioInput option").length === 0) {
            return;
        } else if ($(this).attr('id') == 'sendVideo' && $("#videoInput option").length === 0) {
            return;
        } else if (($(this).attr('id') == 'receiveWidth' || $(this).attr('id') == 'receiveHeight')) {
            if (!$("#receiveDefaultSize").is(":checked")) $(this).removeAttr("disabled");
        } else if ($(this).attr('id') == 'receiveMinBitrate') {
            if (!$("#receiveDefaultBitrate").is(":checked")) $(this).removeAttr("disabled");
        } else if ($(this).attr('id') == 'receiveMaxBitrate') {
            if (!$("#receiveDefaultBitrate").is(":checked")) $(this).removeAttr("disabled");
        } else if ($(this).attr('id') == 'quality') {
            if (!$("#receiveDefaultQuality").is(":checked")) $(this).removeAttr("disabled");
        } else {
            $(this).removeAttr("disabled");
        }
    });
}

function resizeLocalVideo(event) {
    var requested = constraints.video;
    if (requested.width != event.target.videoWidth || requested.height != event.target.videoHeight) {
        console.warn("Camera does not support requested resolution, actual resolution is " + event.target.videoWidth + "x" + event.target.videoHeight);
    }
    $("#publishResolution").text(event.target.videoWidth + "x" + event.target.videoHeight);
    resizeVideo(event.target);
}

function validateForm() {
    var valid = true;
    if (!$("#sendVideo").is(':checked') && !$("#sendAudio").is(':checked')) {
        highlightInput($("#sendVideo"));
        highlightInput($("#sendAudio"));
        valid = false;
    } else {
        removeHighlight($("#sendVideo"));
        removeHighlight($("#sendAudio"));
    }
    if (!$("#playVideo").is(':checked') && !$("#playAudio").is(':checked')) {
        highlightInput($("#playVideo"));
        highlightInput($("#playAudio"));
        valid = false;
    } else {
        removeHighlight($("#playVideo"));
        removeHighlight($("#playAudio"));
    }

    var validateInputs = function (selector) {
        $('#form ' + selector + ' :text, ' + selector + ' select').each(function () {
            if (!$(this).val()) {
                highlightInput($(this));
                valid = false;
            } else {
                var numericFields = ['fps', 'sendWidth', 'sendHeight', 'sendVideoMinBitrate', 'sendVideoMaxBitrate', 'receiveBitrate', 'quality'];
                if (numericFields.indexOf(this.id) != -1 && !(parseInt($(this).val()) >= 0)) {
                    highlightInput($(this));
                    valid = false;
                } else {
                    removeHighlight($(this));
                }
            }
        });
    };

    if ($("#sendAudio").is(':checked')) {
        validateInputs("#sendAudioGroup");
    }
    if ($("#sendVideo").is(':checked')) {
        validateInputs("#sendVideoGroup");
    }
    validateInputs("#playGroup");
    return valid;

    function highlightInput(input) {
        input.closest('.form-group').addClass("has-error");
    }

    function removeHighlight(input) {
        input.closest('.form-group').removeClass("has-error");
    }
}

function muteAudio() {
    if (publishStream) {
        publishStream.muteAudio();
    }
}

function unmuteAudio() {
    if (publishStream) {
        publishStream.unmuteAudio();
    }
}

function muteVideo() {
    if (publishStream) {
        publishStream.muteVideo();
    }
}

function unmuteVideo() {
    if (publishStream) {
        publishStream.unmuteVideo();
    }
}

function switchToScreen() {
    if (publishStream) {
        $('#switchBtn').prop('disabled', true);
        $('#videoInput').prop('disabled', true);
        publishStream.switchToScreen($('#mediaSource').val()).catch(function () {
            $("#screenShareToggle").removeAttr("checked");
            $('#switchBtn').prop('disabled', false);
            $('#videoInput').prop('disabled', false);
        });
    }
}

function switchToCam() {
    if (publishStream) {
        publishStream.switchToCam();
        $('#switchBtn').prop('disabled', false);
        $('#videoInput').prop('disabled', false);
    }
}

function enableToggles(enable) {
    var $muteAudioToggle = $("#muteAudioToggle");
    var $muteVideoToggle = $("#muteVideoToggle");
    var $screenShareToggle = $("#screenShareToggle");

    if (enable) {
        $muteAudioToggle.removeAttr("disabled");
        $muteAudioToggle.trigger('change');
        $muteVideoToggle.removeAttr("disabled");
        $muteVideoToggle.trigger('change');
        $screenShareToggle.removeAttr("disabled");
        $screenShareToggle.trigger('change');
    }
    else {
        $muteAudioToggle.prop('checked', false).attr('disabled', 'disabled').trigger('change');
        $muteVideoToggle.prop('checked', false).attr('disabled', 'disabled').trigger('change');
        $screenShareToggle.prop('checked', false).attr('disabled', 'disabled').trigger('change');
    }
}

// This code is just show how to detect speech activity
// Get player stream and connect it to script processor
// All magic is done by handleAudio function

function detectSpeech(stream, level, latency) {
    var mediaStream = document.getElementById(stream.id()).srcObject;
    var source = audioContext.createMediaStreamSource(mediaStream);
    var processor = audioContext.createScriptProcessor(512);
    processor.onaudioprocess = handleAudio;
    processor.connect(audioContext.destination);
    processor.clipping = false;
    processor.lastClip = 0;
    // threshold
    processor.threshold = level || 0.10;
    processor.latency = latency || 750;

    processor.isSpeech =
        function () {
            if (!this.clipping) return false;
            if ((this.lastClip + this.latency) < window.performance.now()) this.clipping = false;
            return this.clipping;
        };

    source.connect(processor);

    // Check speech every 500 ms
    intervalID = setInterval(function () {
        if (processor.isSpeech()) {
            $("#talking").css('background-color', 'green');
        } else {
            $("#talking").css('background-color', 'red');
        }
    }, 500);
}

function handleAudio(event) {
    var buf = event.inputBuffer.getChannelData(0);
    var bufLength = buf.length;
    var x;
    for (var i = 0; i < bufLength; i++) {
        x = buf[i];
        if (Math.abs(x) >= this.threshold) {
            this.clipping = true;
            this.lastClip = window.performance.now();
        }
    }
}

function drawSquare() {
    var ctx = canvas.getContext("2d");
    ctx.strokeStyle="#FF0000";
    ctx.beginPath();
    ctx.rect(canvas.width / 2 - 100/2, canvas.height / 2 - 100/2, 100 , 100);
    ctx.stroke();
}