<?php
    if (!$members) {
        header('Location: '.constant("_BASE_SITE_URL").$prefix_url);
        exit;
    }

    if ($members) {
        $groups2id = groups2id($members['groups_id']);
        if ($groups2id['id'] != $groups['id']) { header('Location: '.constant("_BASE_SITE_URL").'/'.$groups2id['key']); }
    }

    $enroll = enroll($_GET['id']);
    $courses = courses($enroll['courses_id'], $groups['key']);
    $timeline = $enroll['topics'];
    $enroll_nav = 'class_room';

?>