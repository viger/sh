<?php
    const ROTUER_CONFIG = [
        "/"       => "index#index",
        "/update" => "index#update",
        "/user"   => "user#index",
        "/login"  => "user#login",
        "/admin"  => [
            "/"        => "admin/index#index",
            "/login"   => "admin/index#login",
            "/disable" => "admin/index#disable",
            "/enable"  => "admin/index#enable",
            "/delete"  => "admin/index#delete",
            "/add"     => "admin/index#add",
            "/edit"    => "admin/index#edit"
        ]
    ];