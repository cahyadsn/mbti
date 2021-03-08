<?php
/*
BISMILLAAHIRRAHMAANIRRAHIIM - In the Name of Allah, Most Gracious, Most Merciful
================================================================================
filename 	: inc/config.php
purpose  	: db connection config
create   	: 2015-01-14
last edit	: 2021-03-08
author   	: cahya dsn
demo site 	: https://psycho.cahyadsn.com/mbti
soure code 	: https://github.com/cahyadsn/mbti
================================================================================
This program is free software; you can redistribute it and/or modify it under the
terms of the MIT License.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

See the MIT License for more details

copyright (c) 2021 by cahya dsn; cahyadsn@gmail.com
================================================================================*/
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$dbname='mbti';
$db=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($db->connect_error) {
    die('Connect Error ('.$db->connect_errno.') '. $db->connect_error);
}
