<?php
/**
 * Project make-some-noise
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 4/8/24
 * Time: 01:19
 */

namespace nguyenanhung\TramTro\MakeSomeNoise\Laravel;

class LaravelServerRequirementsChecker
{
    public static function latestVersion()
    {
        return '11.0';
    }

    public static function oldestVersionList()
    {
        return array(
            '4.2',
            '5.0',
            '5.1',
            '5.2',
            '5.3',
            '5.4',
            '5.5',
            '5.6',
            '5.7',
            '5.8',
            '6.0',
            '7.0',
            '8.0',
            '9.0',
            '10.0'
        );
    }

    public static function laravelVersionList()
    {
        $oldest = self::oldestVersionList();
        $latest = array(self::latestVersion());
        return array_merge($oldest, $latest);
    }

    public static function isLaravelBefore420Msg()
    {
        return 'As of PHP 5.5, some OS distributions may require you to manually install the PHP JSON extension.
When using Ubuntu, this can be done via apt-get install php5-json.';
    }

    public static function isLaravelBefore50OMsg()
    {
        return 'PHP version should be < 7. As of PHP 5.5, some OS distributions may require you to manually install the PHP JSON extension.
When using Ubuntu, this can be done via apt-get install php5-json.';
    }

    public static function checkResultMsg()
    {
        $strOk = '<i class="fa fa-check"></i>';
        $strFail = '<i style="color: red" class="fa fa-times"></i>';
        $strUnknown = '<i class="fa fa-question"></i>';
        return array(
            'ok' => $strOk,
            'fail' => $strFail,
            'unknown' => $strUnknown,
        );
    }

    public static function selectedVersion($version, $is)
    {
        return $version === $is ? 'selected' : '';
    }

    public static function laravelVersionPicker($laravelVersion)
    {
        return '
            <option value="11.0" ' . self::selectedVersion($laravelVersion, "11.0") . '>Laravel 11.0 - Latest</option>
            <option value="10.0" ' . self::selectedVersion($laravelVersion, "10.0") . '>Laravel 10.x</option>
            <option value="9.0" ' . self::selectedVersion($laravelVersion, "9.0") . '>Laravel 9.x</option>
            <option value="8.0" ' . self::selectedVersion($laravelVersion, "8.0") . '>Laravel 8.x</option>
            <option value="7.0" ' . self::selectedVersion($laravelVersion, "7.0") . '>Laravel 7.0</option>
            <option value="6.0" ' . self::selectedVersion($laravelVersion, "6.0") . '>Laravel 6.0 LTS</option>
            <option value="5.8" ' . self::selectedVersion($laravelVersion, "5.8") . '>Laravel 5.8</option>
            <option value="5.7" ' . self::selectedVersion($laravelVersion, "5.7") . '>Laravel 5.7</option>
            <option value="5.6" ' . self::selectedVersion($laravelVersion, "5.6") . '>Laravel 5.6</option>
            <option value="5.5" ' . self::selectedVersion($laravelVersion, "5.5") . '>Laravel 5.5 LTS</option>
            <option value="5.4" ' . self::selectedVersion($laravelVersion, "5.4") . '>Laravel 5.4</option>
            <option value="5.3" ' . self::selectedVersion($laravelVersion, "5.3") . '>Laravel 5.3</option>
            <option value="5.2" ' . self::selectedVersion($laravelVersion, "5.2") . '>Laravel 5.2</option>
            <option value="5.1" ' . self::selectedVersion($laravelVersion, "5.1") . '>Laravel 5.1 LTS</option>
            <option value="5.0" ' . self::selectedVersion($laravelVersion, "5.0") . '>Laravel 5.0</option>
            <option value="4.2"' . self::selectedVersion($laravelVersion, "4.2") . ' >Laravel 4.2</option>';
    }

    public static function serverRequirements()
    {
        return array(
            '4.2' => array(
                'php' => '5.4',
                'mcrypt' => true,
                'pdo' => false,
                'openssl' => false,
                'mbstring' => false,
                'tokenizer' => false,
                'xml' => false,
                'ctype' => false,
                'json' => false,
                'obs' => self::isLaravelBefore420Msg()
            ),
            '5.0' => array(
                'php' => '5.4',
                'mcrypt' => true,
                'openssl' => true,
                'pdo' => false,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => false,
                'ctype' => false,
                'json' => false,
                'obs' => self::isLaravelBefore50OMsg()
            ),
            '5.1' => array(
                'php' => '5.5.9',
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => false,
                'ctype' => false,
                'json' => false,
                'obs' => ''
            ),
            '5.2' => array(
                'php' => array(
                    '>=' => '5.5.9',
                    '<' => '7.2.0',
                ),
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => false,
                'ctype' => false,
                'json' => false,
                'obs' => ''
            ),
            '5.3' => array(
                'php' => array(
                    '>=' => '5.6.4',
                    '<' => '7.2.0',
                ),
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => true,
                'ctype' => false,
                'json' => false,
                'obs' => ''
            ),
            '5.4' => array(
                'php' => '5.6.4',
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => true,
                'ctype' => false,
                'json' => false,
                'obs' => ''
            ),
            '5.5' => array(
                'php' => '7.0.0',
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => true,
                'ctype' => false,
                'json' => false,
                'obs' => ''
            ),
            '5.6' => array(
                'php' => '7.1.3',
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => true,
                'ctype' => true,
                'json' => true,
                'obs' => ''
            ),
            '5.7' => array(
                'php' => '7.1.3',
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => true,
                'ctype' => true,
                'json' => true,
                'obs' => ''
            ),
            '5.8' => array(
                'php' => '7.1.3',
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => true,
                'ctype' => true,
                'json' => true,
                'obs' => ''
            ),
            '6.0' => array(
                'php' => '7.2.0',
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => true,
                'ctype' => true,
                'json' => true,
                'bcmath' => true,
                'obs' => ''
            ),
            '7.0' => array(
                'php' => '7.2.5',
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => true,
                'ctype' => true,
                'json' => true,
                'bcmath' => true,
                'obs' => ''
            ),
            '8.0' => array(
                'php' => '7.3.0',
                'mcrypt' => false,
                'openssl' => true,
                'pdo' => true,
                'mbstring' => true,
                'tokenizer' => true,
                'xml' => true,
                'ctype' => true,
                'json' => true,
                'bcmath' => true,
                'obs' => ''
            ),
            '9.0' => array(
                'php' => '8.0.0',
                'mcrypt' => false,
                'ctype' => true,
                'curl' => true,
                'dom' => true,
                'fileinfo' => true,
                'filter' => true,
                'hash' => true,
                'mbstring' => true,
                'openssl' => true,
                'pcre' => true,
                'pdo' => true,
                'session' => true,
                'tokenizer' => true,
                'xml' => true,
                'obs' => ''
            ),
            '10.0' => array(
                'php' => '8.1.0',
                'mcrypt' => false,
                'ctype' => true,
                'curl' => true,
                'dom' => true,
                'fileinfo' => true,
                'filter' => true,
                'hash' => true,
                'mbstring' => true,
                'openssl' => true,
                'pcre' => true,
                'pdo' => true,
                'session' => true,
                'tokenizer' => true,
                'xml' => true,
                'obs' => ''
            ),
            '11.0' => array(
                'php' => '8.2.0',
                'mcrypt' => false,
                'ctype' => true,
                'curl' => true,
                'dom' => true,
                'fileinfo' => true,
                'filter' => true,
                'hash' => true,
                'mbstring' => true,
                'openssl' => true,
                'pcre' => true,
                'pdo' => true,
                'session' => true,
                'tokenizer' => true,
                'xml' => true,
                'obs' => ''
            ),
        );
    }

    public static function serverRequirementsPhpExtensions()
    {
        return array(
            'curl',
            'hash',
            'tokenizer',
            'bcmath',
            'pcre',
            'mbstring',
            'mcrypt',
            'openssl',
            'fileinfo',
            'filter',
            'xml',
            'pdo',
            'ctype',
            'dom',
            'json'
        );
    }

    public static function serverRequirementsCheck($laravelVersion = '')
    {
        $serverRequirementsList = self::serverRequirements();
        if ( ! array_key_exists($laravelVersion, $serverRequirementsList)) {
            return array();
        }

        $requirements = array();
        if (is_array($serverRequirementsList[$laravelVersion]['php'])) {
            $requirements['php_version'] = true;
            foreach ($serverRequirementsList[$laravelVersion]['php'] as $operator => $version) {
                if ( ! version_compare(PHP_VERSION, $version, $operator)) {
                    $requirements['php_version'] = false;
                    break;
                }
            }
        } else {
            $requirements['php_version'] = version_compare(
                PHP_VERSION,
                $serverRequirementsList[$laravelVersion]['php'],
                ">="
            );
        }
        $requirements['pdo_enabled'] = defined('PDO::ATTR_DRIVER_NAME');

        $listExtensions = self::serverRequirementsPhpExtensions();

        foreach ($listExtensions as $extension) {
            $requirements[$extension . '_enabled'] = extension_loaded($extension);
        }

        $requirements['mod_rewrite_enabled'] = null;

        if (function_exists('apache_get_modules')) {
            $requirements['mod_rewrite_enabled'] = in_array('mod_rewrite', apache_get_modules());
        }

        return $requirements;
    }

    public static function showCheckPhpExtension($name = '', $result = '', $value = null)
    {
        if ( ! empty($value)) {
            return '<p>PHP Extension ' . $name . ' ' . $result . ' (' . $value . ')</p>';
        }

        return '<p>PHP Extension ' . $name . ' ' . $result . '</p>';
    }

    public static function serverRequirementsPhpExtensionsDefaultCheck()
    {
        $resultMsg = self::checkResultMsg();
        $msg = self::showCheckPhpExtension(
            'magic_quotes_gpc',
            ! ini_get('magic_quotes_gpc') ? $resultMsg['ok'] : $resultMsg['fail'],
            'value: ' . ini_get('magic_quotes_gpc')
        );
        $msg .= self::showCheckPhpExtension(
            'register_globals',
            ! ini_get('register_globals') ? $resultMsg['ok'] : $resultMsg['fail'],
            'value: ' . ini_get('register_globals')
        );
        $msg .= self::showCheckPhpExtension(
            'session.auto_start',
            ! ini_get('session.auto_start') ? $resultMsg['ok'] : $resultMsg['fail'],
            'value: ' . ini_get('session.auto_start')
        );
        $msg .= self::showCheckPhpExtension(
            'mbstring.func_overload',
            ! ini_get('mbstring.func_overload') ? $resultMsg['ok'] : $resultMsg['fail'],
            'value: ' . ini_get('mbstring.func_overload')
        );
        return $msg;
    }

    public static function serverRequirementsPhpExtensionsCheckResult($laravelVersion)
    {
        $resultMsg = self::checkResultMsg();
        $serverRequirementsList = self::serverRequirements();
        $requirements = self::serverRequirementsCheck($laravelVersion);
        $listExtensions = self::serverRequirementsPhpExtensions();
        $msg = '';
        foreach ($listExtensions as $extension) {
            if (isset($serverRequirementsList[$laravelVersion][$extension])) {
                if ($serverRequirementsList[$laravelVersion][$extension] === true) {
                    $extensionNeedEnabled = true;
                    $extensionNeedMsg = '<strong>' . $extension . '</strong> need <strong>enabled</strong>';
                } else {
                    $extensionNeedEnabled = false;
                    $extensionNeedMsg = '<strong>' . $extension . '</strong> need <strong>disabled</strong>';
                }
                if ($extensionNeedEnabled === false && $requirements[$extension . '_enabled'] === false) {
                    $check = $resultMsg['ok'];
                } else {
                    $check = $requirements[$extension . '_enabled'] ? $resultMsg['ok'] : $resultMsg['fail'];
                }
                $msg .= self::showCheckPhpExtension($extensionNeedMsg, $check);
            }
        }
        return $msg . self::serverRequirementsPhpExtensionsDefaultCheck();
    }

    public static function serverRequirementsPhpVersionCheckResultMsg($laravelVersion)
    {
        echo "PHP ";
        $resultMsg = self::checkResultMsg();
        $serverRequirementsList = self::serverRequirements();
        $requirements = self::serverRequirementsCheck($laravelVersion);
        if (is_array($serverRequirementsList[$laravelVersion]['php'])) {
            $phpVersions = array();
            foreach ($serverRequirementsList[$laravelVersion]['php'] as $operator => $version) {
                $phpVersions[] = "{$operator} {$version}";
            }
            echo implode(" && ", $phpVersions);
        } else {
            echo ">= " . $serverRequirementsList[$laravelVersion]['php'];
        }

        echo " " . ($requirements['php_version'] ? $resultMsg['ok'] : $resultMsg['fail']) . '(Your PHP version: ' . PHP_VERSION . ')';
    }
}
