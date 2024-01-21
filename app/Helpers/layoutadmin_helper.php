<?php

if (!function_exists('layoutAdmin')) {
    function layoutAdmin($title, $contentView, $data = [])
    {
        $data['title'] = $title;
        $data['content'] = view($contentView, $data);
        echo view('pages/admin/layout', $data);
    }
}
