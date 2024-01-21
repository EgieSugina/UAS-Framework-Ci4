<?php

if (!function_exists('layoutMember')) {
    function layoutMember($title, $contentView, $data = [])
    {
        $data['title'] = $title;
        $data['content'] = view($contentView, $data);
        echo view('pages/member/layout', $data);
    }
}
