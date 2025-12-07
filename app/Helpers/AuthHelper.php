<?php

function isAdmin()
{
    return session()->get('role') === 'admin';
}

function isStaff()
{
    return session()->get('role') === 'staff';
}
