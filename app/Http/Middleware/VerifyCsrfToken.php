<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'advertisement/delete',
        'article/delete',
        'article/pass',
        'banner/delete',
        'catalog/delete',
        'class/delete',
        'link/delete',
        'major/delete',
        'notice/delete',
        'notice/pass',
        'power/delete',
        'student/delete',
        'teacher/delete',
        'resource/delete',
        'resource/pass',
        'course/pass',
        'course/operate',
        'course/delete',
        'course/select',
        'leaveNote/delete',
        'leaveNote/pass',
        'asset/delete',
        'application/pass',
        'application/execute',
        'application/delete',
        'upload'
    ];
}