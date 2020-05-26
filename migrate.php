<?php
define('REQUEST_TIME', microtime(true));

define('OUTPUT_LOG', $argv[1] ?? false);
define('OUTPUT_FILE', 'db.cache.json');

require __DIR__ . '/config/Database.php';

$db = new Database;

unset($argv[0], $argv[1]);
$sql = $argc > 1 ? join(' ', $argv) : null;

if (empty($sql)) {
    /* ------------------------------------------------- 
     *    Migrating to Database
     * -------------------------------------------------
     */
    $db->execute('CREATE TABLE IF NOT EXISTS `custom_product_field` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `field_type` int(11) NOT NULL,
  `detail_view` int(11) NOT NULL,
  `add_view` int(11) NOT NULL,
  `visible_to` int(11) NOT NULL,
  `active_flag` int(1) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `email_details` (
    `email_details_id` int(11) NOT NULL,
    `email` varchar(255) NOT NULL,
    `email_type_id` int(11) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `email_type` (
    `email_type_id` int(11) NOT NULL,
    `email_type_description` varchar(255) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `label` (
    `label_id` int(11) NOT NULL,
    `label_name` varchar(255) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `organization` (
    `organization_id` int(11) NOT NULL,
    `organization_name` varchar(255) NOT NULL,
    `address` varchar(255) NOT NULL,
    `label_id` int(11) NOT NULL,
    `owner_id` int(11) NOT NULL,
    `activities_to_do` int(11) NOT NULL,
    `closed_deals` int(11) NOT NULL,
    `done_activities` int(11) NOT NULL,
    `last_activity_date` datetime NOT NULL,
    `lost_deals` int(11) NOT NULL,
    `next_activity_date` datetime NOT NULL,
    `open_deals` int(11) NOT NULL,
    `organization_created_at` datetime NOT NULL,
    `total_activities` int(11) NOT NULL,
    `update_time` datetime NOT NULL,
    `visibility_group_id` int(11) NOT NULL,
    `won_deals` int(11) NOT NULL,
    `profile_picture` blob NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `owner_visibility_group` (
    `id` int(11) NOT NULL,
    `owner_visibility_name` varchar(255) NOT NULL,
    `description` varchar(255) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `people` (
    `people_id` int(11) NOT NULL,
    `organization_id` int(11) NOT NULL,
    `label_id` int(11) NOT NULL,
    `phoneDetails_id` int(11) NOT NULL,
    `emailDetails_id` int(11) NOT NULL,
    `owner_id` int(11) NOT NULL,
    `id` int(11) NOT NULL,
    `activities_to_do` int(11) NOT NULL,
    `closed_deals` int(11) NOT NULL,
    `done_activities` int(11) NOT NULL,
    `email_messages_count` int(11) NOT NULL,
    `last_activity_date` datetime NOT NULL,
    `lost_deals` int(11) NOT NULL,
    `next_activity_date` datetime NOT NULL,
    `open_deals` int(11) NOT NULL,
    `person_created_at` datetime NOT NULL,
    `profile_pic` blob NOT NULL,
    `total_activities` int(11) NOT NULL,
    `update_time` datetime NOT NULL,
    `visible_to` int(11) NOT NULL,
    `won_deals` int(11) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `permission_activity` (
    `permission_activity_id` int(11) NOT NULL,
    `permission_activity_name` varchar(255) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `permission_set` (
    `permission_set_id` int(11) NOT NULL,
    `permission_set_name` varchar(255) NOT NULL,
    `permission_activity_id` int(11) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `phone_details` (
    `ph_details_id` int(11) NOT NULL,
    `number` int(11) NOT NULL,
    `phone_type` int(11) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `phone_type` (
    `phone_type_id` int(11) NOT NULL,
    `phone_type_description` varchar(255) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `product` (
    `id` int(11) NOT NULL,
    `product_name` varchar(255) NOT NULL,
    `product_code` varchar(255) NOT NULL,
    `category_id` int(11) NOT NULL,
    `unit` varchar(255) NOT NULL,
    `unit_price` decimal(10,0) NOT NULL,
    `currency` text NOT NULL,
    `total_price` decimal(10,0) NOT NULL,
    `owner_id` int(11) NOT NULL,
    `visible_to` int(11) NOT NULL,
    `active_flag` int(1) NOT NULL,
    `description` varchar(255) NOT NULL,
    `tax` int(11) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `team` (
    `team_id` int(11) NOT NULL,
    `team_name` varchar(255) NOT NULL,
    `team_manager` int(11) NOT NULL,
    `team_description` varchar(255) NOT NULL,
    `team_members` varchar(255) NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `user` (
    `user_id` int(11) NOT NULL,
    `email` varchar(255) NOT NULL,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `visibility_group` int(11) NOT NULL,
    `active_flag` int(1) NOT NULL,
    `permission_set` int(11) NOT NULL,
    `last_login` datetime NOT NULL
);');

    $db->execute('CREATE TABLE IF NOT EXISTS `visibility_group` (
    `visibility_group_id` int(11) NOT NULL,
    `visibility_group_name` varchar(255) NOT NULL,
    `parent_group` int(11) NOT NULL
);');

    return file_exists('defaults.sql') && $db->execute(file_get_contents('defaults.sql'));
} else {
    /* ------------------------------------------------- 
 *    Query From Database
 * -------------------------------------------------
 */
    try {
        $sql = "SELECT * FROM {$sql}";
        $stmt = $db->query($sql);
        $results = [];
        $results[] = $result = $stmt->fetchArray(SQLITE3_ASSOC);
        while ($result) {
            $results[] = $result = $stmt->fetchArray(SQLITE3_ASSOC);
        }
        unset($result);
        array_pop($results);
        $results = json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        OUTPUT_FILE && file_put_contents(OUTPUT_FILE, $results);
    } catch (Throwable $e) {
        echo "\033[0;36m [SQL] > ", $sql, PHP_EOL, "\033[1;31m", $e->getMessage(), "\033[0m", PHP_EOL;
    }
    error_log('Load Time: ' . round((microtime(true) - REQUEST_TIME) * 1000, 2) . 'ms', 4);
    OUTPUT_LOG && print $results ?? null;
}