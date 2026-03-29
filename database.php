<?php
/**
 * إعدادات الاتصال بقاعدة البيانات (PDO)
 * مشروع الأثير — جمعية المشي والجري بالأحساء
 */

declare(strict_types=1);

const DB_HOST = 'localhost';
const DB_NAME = 'u741730784_alatheer';
const DB_USER = 'u741730784_admin_alaheer';
const DB_PASS = 'Aa123456@!pass';
const DB_CHARSET = 'utf8mb4';

/**
 * إنشاء اتصال PDO أو إيقاف التنفيذ برسالة عربية واضحة
 */
function get_pdo(): PDO
{
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
        return $pdo;
    } catch (PDOException $e) {
        http_response_code(500);
        echo '<!DOCTYPE html><html lang="ar" dir="rtl"><head><meta charset="UTF-8"><title>خطأ في الاتصال</title></head><body style="font-family:sans-serif;padding:2rem;">';
        echo '<h1>تعذّر الاتصال بقاعدة البيانات</h1>';
        echo '<p>تحقق من إعدادات الملف <code>config/database.php</code> وتأكد من تشغيل خادم MySQL وإنشاء قاعدة البيانات <strong>atheer_db</strong>.</p>';
        echo '<p style="color:#666;">تفاصيل تقنية (للمطور): ' . htmlspecialchars($e->getMessage(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
        echo '</body></html>';
        exit;
    }
}
