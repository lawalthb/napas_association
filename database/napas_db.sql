-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2024 at 05:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `napas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_sessions`
--

CREATE TABLE `academic_sessions` (
  `id` int NOT NULL,
  `session_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '2023-2024',
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `is_active` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_sessions`
--

INSERT INTO `academic_sessions` (`id`, `session_name`, `from_date`, `to_date`, `is_active`, `updated_by`, `updated_at`, `created_at`) VALUES
(1, '2023-2024', '2023-04-01', '2024-04-01', 'Yes', 1, '2024-07-29 22:16:37', '2024-04-16 18:09:57'),
(2, '2022-2023', '2023-07-01', '2023-12-31', 'Yes', 1, '2024-07-28 16:48:55', '2024-07-28 16:48:55'),
(3, '2021-2022', '2021-07-01', '2022-07-31', 'Yes', 1, '2024-07-29 22:16:24', '2024-07-29 22:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `all_permissions`
--

CREATE TABLE `all_permissions` (
  `permission_id` int NOT NULL,
  `permission` varchar(255) NOT NULL,
  `role_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `all_permissions`
--

INSERT INTO `all_permissions` (`permission_id`, `permission`, `role_id`) VALUES
(272, 'home/index', 1),
(273, 'account/index', 1),
(274, 'account/edit', 1),
(275, 'academicsessions/view', 1),
(276, 'academicsessions/add', 1),
(277, 'academicsessions/edit', 1),
(278, 'academicsessions/delete', 1),
(279, 'academicsessions/importdata', 1),
(280, 'contestcategories/view', 1),
(281, 'contestcategories/add', 1),
(282, 'contestcategories/edit', 1),
(283, 'contestcategories/delete', 1),
(284, 'contestcategories/importdata', 1),
(285, 'contestnominees/view', 1),
(286, 'contestnominees/add', 1),
(287, 'contestnominees/edit', 1),
(288, 'contestnominees/delete', 1),
(289, 'contestnominees/importdata', 1),
(290, 'contestvotes/view', 1),
(291, 'contestvotes/add', 1),
(292, 'contestvotes/edit', 1),
(293, 'contestvotes/delete', 1),
(294, 'contestvotes/importdata', 1),
(295, 'electionaspirants/view', 1),
(296, 'electionaspirants/add', 1),
(297, 'electionaspirants/edit', 1),
(298, 'electionaspirants/delete', 1),
(299, 'electionaspirants/importdata', 1),
(300, 'electionpositions/view', 1),
(301, 'electionpositions/add', 1),
(302, 'electionpositions/edit', 1),
(303, 'electionpositions/delete', 1),
(304, 'electionpositions/importdata', 1),
(305, 'electionvotes/view', 1),
(306, 'electionvotes/add', 1),
(307, 'electionvotes/edit', 1),
(308, 'electionvotes/delete', 1),
(309, 'electionvotes/importdata', 1),
(310, 'finalprojects/view', 1),
(311, 'finalprojects/add', 1),
(312, 'finalprojects/edit', 1),
(313, 'finalprojects/delete', 1),
(314, 'finalprojects/importdata', 1),
(315, 'levels/view', 1),
(316, 'levels/add', 1),
(317, 'levels/edit', 1),
(318, 'levels/delete', 1),
(319, 'levels/importdata', 1),
(320, 'pricesettings/view', 1),
(321, 'pricesettings/add', 1),
(322, 'pricesettings/edit', 1),
(323, 'pricesettings/delete', 1),
(324, 'pricesettings/importdata', 1),
(325, 'projectsupervisors/view', 1),
(326, 'projectsupervisors/add', 1),
(327, 'projectsupervisors/edit', 1),
(328, 'projectsupervisors/delete', 1),
(329, 'projectsupervisors/importdata', 1),
(330, 'resourcecategories/view', 1),
(331, 'resourcecategories/add', 1),
(332, 'resourcecategories/edit', 1),
(333, 'resourcecategories/delete', 1),
(334, 'resourcecategories/importdata', 1),
(335, 'resourceitems/view', 1),
(336, 'resourceitems/add', 1),
(337, 'resourceitems/edit', 1),
(338, 'resourceitems/delete', 1),
(339, 'resourceitems/importdata', 1),
(340, 'resourcespaids/view', 1),
(341, 'resourcespaids/add', 1),
(342, 'resourcespaids/edit', 1),
(343, 'resourcespaids/delete', 1),
(344, 'resourcespaids/importdata', 1),
(345, 'supervisorusers/view', 1),
(346, 'supervisorusers/add', 1),
(347, 'supervisorusers/edit', 1),
(348, 'supervisorusers/delete', 1),
(349, 'supervisorusers/importdata', 1),
(350, 'transactions/view', 1),
(351, 'transactions/add', 1),
(352, 'transactions/edit', 1),
(353, 'transactions/delete', 1),
(354, 'transactions/importdata', 1),
(355, 'users/view', 1),
(356, 'users/add', 1),
(357, 'users/edit', 1),
(358, 'users/delete', 1),
(359, 'users/importdata', 1),
(360, 'webabouts/view', 1),
(361, 'webabouts/add', 1),
(362, 'webabouts/edit', 1),
(363, 'webabouts/delete', 1),
(364, 'webabouts/importdata', 1),
(365, 'webbenefits/view', 1),
(366, 'webbenefits/add', 1),
(367, 'webbenefits/edit', 1),
(368, 'webbenefits/delete', 1),
(369, 'webbenefits/importdata', 1),
(370, 'webcolours/view', 1),
(371, 'webcolours/edit', 1),
(372, 'webcolours/delete', 1),
(373, 'webcolours/importdata', 1),
(374, 'webcontacts/view', 1),
(375, 'webcontacts/add', 1),
(376, 'webcontacts/edit', 1),
(377, 'webcontacts/delete', 1),
(378, 'webcontacts/importdata', 1),
(379, 'webcounters/view', 1),
(380, 'webcounters/add', 1),
(381, 'webcounters/edit', 1),
(382, 'webcounters/delete', 1),
(383, 'webcounters/importdata', 1),
(384, 'webctas/view', 1),
(385, 'webctas/add', 1),
(386, 'webctas/edit', 1),
(387, 'webctas/delete', 1),
(388, 'webctas/importdata', 1),
(389, 'webevents/view', 1),
(390, 'webevents/add', 1),
(391, 'webevents/edit', 1),
(392, 'webevents/delete', 1),
(393, 'webevents/importdata', 1),
(394, 'webexcos/view', 1),
(395, 'webexcos/add', 1),
(396, 'webexcos/edit', 1),
(397, 'webexcos/delete', 1),
(398, 'webexcos/importdata', 1),
(399, 'webgalleries/view', 1),
(400, 'webgalleries/add', 1),
(401, 'webgalleries/edit', 1),
(402, 'webgalleries/delete', 1),
(403, 'webgalleries/importdata', 1),
(404, 'webheaders/view', 1),
(405, 'webheaders/add', 1),
(406, 'webheaders/edit', 1),
(407, 'webheaders/delete', 1),
(408, 'webheaders/importdata', 1),
(409, 'webregistrations/view', 1),
(410, 'webregistrations/add', 1),
(411, 'webregistrations/edit', 1),
(412, 'webregistrations/delete', 1),
(413, 'webregistrations/importdata', 1),
(414, 'webresources/view', 1),
(415, 'webresources/add', 1),
(416, 'webresources/edit', 1),
(417, 'webresources/delete', 1),
(418, 'webresources/importdata', 1),
(419, 'websettings/view', 1),
(420, 'websettings/add', 1),
(421, 'websettings/edit', 1),
(422, 'websettings/delete', 1),
(423, 'websettings/importdata', 1),
(424, 'websliders/view', 1),
(425, 'websliders/add', 1),
(426, 'websliders/edit', 1),
(427, 'websliders/delete', 1),
(428, 'websliders/importdata', 1),
(429, 'webtestimonials/view', 1),
(430, 'webtestimonials/add', 1),
(431, 'webtestimonials/edit', 1),
(432, 'webtestimonials/delete', 1),
(433, 'webtestimonials/importdata', 1),
(434, 'webtopbars/view', 1),
(435, 'webtopbars/edit', 1),
(436, 'webtopbars/delete', 1),
(437, 'webtopbars/importdata', 1),
(438, 'webvissions/view', 1),
(439, 'webvissions/add', 1),
(440, 'webvissions/edit', 1),
(441, 'webvissions/delete', 1),
(442, 'webvissions/importdata', 1),
(443, 'academicsessions/index', 1),
(444, 'appsettings/index', 1),
(445, 'appsettings/view', 1),
(446, 'appsettings/add', 1),
(447, 'appsettings/edit', 1),
(448, 'appsettings/delete', 1),
(449, 'contestcategories/index', 1),
(450, 'contestnominees/index', 1),
(451, 'contestvotes/index', 1),
(452, 'electionaspirants/index', 1),
(453, 'electionpositions/index', 1),
(454, 'electionvotes/index', 1),
(455, 'finalprojects/index', 1),
(456, 'levels/index', 1),
(457, 'pricesettings/index', 1),
(458, 'projectsupervisors/index', 1),
(459, 'resourcecategories/index', 1),
(460, 'resourceitems/index', 1),
(461, 'resourceitems/list_pdfs', 1),
(462, 'resourceitems/list_videos', 1),
(463, 'resourceitems/add_pdfs', 1),
(464, 'resourceitems/add_videos', 1),
(465, 'resourceitems/member_list', 1),
(466, 'resourceitems/edit_pdf', 1),
(467, 'resourceitems/edit_video', 1),
(468, 'resourcespaids/index', 1),
(469, 'supervisorusers/index', 1),
(470, 'transactions/index', 1),
(471, 'transactions/member_list', 1),
(472, 'users/index', 1),
(473, 'webabouts/index', 1),
(474, 'webbenefits/index', 1),
(475, 'webcolours/index', 1),
(476, 'webcontacts/index', 1),
(477, 'webcounters/index', 1),
(478, 'webctas/index', 1),
(479, 'webevents/index', 1),
(480, 'webexcos/index', 1),
(481, 'webgalleries/index', 1),
(482, 'webheaders/index', 1),
(483, 'webregistrations/index', 1),
(484, 'webresources/index', 1),
(485, 'websettings/index', 1),
(486, 'websliders/index', 1),
(487, 'webtestimonials/index', 1),
(488, 'webtopbars/index', 1),
(489, 'webvissions/index', 1),
(490, 'permissions/index', 1),
(491, 'permissions/view', 1),
(492, 'permissions/add', 1),
(493, 'permissions/edit', 1),
(494, 'permissions/delete', 1),
(495, 'roles/index', 1),
(496, 'roles/view', 1),
(497, 'roles/add', 1),
(498, 'roles/edit', 1),
(499, 'roles/delete', 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `name`, `value`, `slug`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Email Address', 'admin@email.com', 'email', 0, '2019-11-22 05:41:04', NULL),
(2, 'Mobile', '9874563210', 'mobile', 0, '2019-11-22 05:41:04', NULL),
(3, 'Address', '216 , Regal Indl Estate, Acharya Dhonde Marg, Sewree', 'address', 0, '2019-11-22 05:41:04', NULL),
(4, 'Paystack Generate Recipient', 'https://api.paystack.co/transferrecipient', 'paystackGenerateRecipient', 0, '2020-01-07 17:30:00', NULL),
(5, 'Paystack OTP Verification', 'https://api.paystack.co/transfer', 'paystackOtpVerify', 0, '2020-01-07 17:30:00', NULL),
(6, 'Paystack Resend OTP', 'https://api.paystack.co/transfer/resend_otp', 'paystackResendOtp', 0, '2020-01-07 17:30:00', NULL),
(7, 'Paystack Finalize Transfer', 'https://api.paystack.co/transfer/finalize_transfer', 'paystackFinalTransfer', 0, '2020-01-07 17:30:00', NULL),
(8, 'Paystack Email', 'paytest@mailboxt.com', 'paystackemail', 0, '2019-11-22 05:41:04', NULL),
(9, 'Contact Us', 'donejeh@gmail.com', 'contact_us', 0, '2020-04-12 20:19:29', '2020-04-12 20:17:26'),
(10, 'Paystack Charge', 'https://api.paystack.co/charge', 'paystackCharge', 0, NULL, NULL),
(11, 'Paystack Verify transaction', 'https://api.paystack.co/transaction/verify', 'paystackVerifytransaction', 0, NULL, NULL),
(12, 'Paystack Disable Subscription', 'https://api.paystack.co/subscription/disable', 'paystackDisableSubscription', 0, NULL, NULL),
(13, 'Paystack Enable Subscription', 'https://api.paystack.co/subscription/enable', 'paystackEnableSubscription', 0, NULL, NULL),
(14, 'Transaction Fees', '1', 'transactionFees', 0, NULL, NULL),
(15, 'Push notification key', 'AAAANx8g43o:APA91bHW26755huHhI2-5idBElrpcayBmQWP6cP82i9F6bEMipD5cQvSjL_TDnEjJ6gsudZG0dnxjgQMK44KS4ngIRe-PYGvvDgcMqOfnL2aGxuD4Oerx-4VtsFDG-oSBLRskF7p3Wc4', 'firebase_key', 0, NULL, NULL),
(16, 'Secret Key', 'sk_test_61c50b3d3e1e227bb2fc3e36b57774f0ae257936', 'secretkey', 0, '2020-01-07 17:30:00', NULL),
(17, 'Public Key', 'pk_test_9667c0c4009cfbd260edb090b6317ebab8b87ce1', 'publickey', 0, '2020-01-07 17:30:00', NULL),
(18, 'Nomba Client ID', '0078c937-9412-4ae9-b0bc-d53c40b0566c', 'nombaClientID', 1, '2020-01-07 17:30:00', NULL),
(19, 'Nomba Private key', 'Jhhua4K/YpUxaNolgBJx4vwjpO9ZhP84fzJWsFMG5A+0omaHfEGQ5ckB5Ji/fYw4j4gW2WnaQBm7EYVAxFVhYg==', 'nombaPrivatekey', 1, '2020-01-07 17:30:00', NULL),
(20, 'Nomba Account ID', 'b1f98aeb-3ee8-4c4e-a944-7a7d879a93be', 'nombaAccountID', 1, '2020-01-07 17:30:00', NULL),
(21, 'Map Api Server Key', 'AIzaSyDMl9gMhFdQ8yel_p9EREkl-i9ocbBf178', 'map_api_key_server', 0, '2020-01-07 17:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contest_categories`
--

CREATE TABLE `contest_categories` (
  `id` bigint NOT NULL,
  `academic_session_id` int DEFAULT '1',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int DEFAULT '0',
  `updated_by` bigint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `positioning` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contest_categories`
--

INSERT INTO `contest_categories` (`id`, `academic_session_id`, `name`, `price`, `updated_by`, `created_at`, `updated_at`, `positioning`) VALUES
(1, 1, 'NABAMS Executive of the year', 100, 83, '2024-07-04 09:18:40', '2024-07-04 09:18:40', 1),
(2, 1, 'Most Outstanding Male', 100, 83, '2024-07-04 09:19:44', '2024-07-04 09:19:44', 1),
(3, 1, 'Most Outstanding Female', 100, 83, '2024-07-04 09:24:17', '2024-07-04 09:24:17', 1),
(4, 1, 'Baby of the year', 100, 83, '2024-07-04 09:24:35', '2024-07-04 09:24:35', 1),
(5, 1, 'Best Dressed Male', 100, 83, '2024-07-04 09:30:36', '2024-07-04 09:30:36', 1),
(6, 1, 'Best dressed Female', 100, 83, '2024-07-04 09:32:47', '2024-07-04 09:32:47', 1),
(7, 1, 'Sportsman of the year', 100, 83, '2024-07-04 09:33:28', '2024-07-04 09:33:28', 1),
(8, 1, 'Best Male Striker', 100, 83, '2024-07-04 09:34:24', '2024-07-04 09:34:24', 1),
(9, 1, 'Best female striker', 100, 83, '2024-07-04 09:35:01', '2024-07-04 09:35:01', 1),
(10, 1, 'Big, Bold and Beautiful', 100, 83, '2024-07-04 09:35:59', '2024-07-04 09:35:59', 1),
(11, 1, 'Next rated of the year', 100, 83, '2024-07-04 09:36:24', '2024-07-04 09:36:24', 1),
(12, 1, 'Rookie of the year', 100, 83, '2024-07-04 09:37:21', '2024-07-04 09:37:21', 1),
(13, 1, 'Political icon of the year', 100, 83, '2024-07-04 09:37:40', '2024-07-04 09:37:40', 1),
(14, 1, 'Fashionista of the year', 100, 83, '2024-07-04 09:38:05', '2024-07-04 09:38:05', 1),
(15, 1, 'Most Handsome', 100, 83, '2024-07-04 09:38:24', '2024-07-04 09:38:24', 1),
(16, 1, 'Most Beautiful', 100, 83, '2024-07-04 09:38:43', '2024-07-04 09:38:43', 1),
(17, 1, 'Most Expensive Male', 100, 83, '2024-07-04 09:39:22', '2024-07-04 09:39:22', 1),
(18, 1, 'Most Expensive Female', 100, 83, '2024-07-04 09:39:46', '2024-07-04 09:39:46', 1),
(19, 1, 'Best Couple', 100, 83, '2024-07-04 09:40:08', '2024-07-04 09:40:08', 1),
(20, 1, 'Fast Rising Artist', 100, 83, '2024-07-04 09:43:16', '2024-07-04 09:43:16', 1),
(21, 1, 'Most Talented', 100, 83, '2024-07-04 09:44:46', '2024-07-04 09:44:46', 1),
(22, 1, 'Most Popular Male', 100, 83, '2024-07-04 09:46:05', '2024-07-04 09:46:05', 1),
(23, 1, 'Most Popular Female', 100, 83, '2024-07-04 09:46:24', '2024-07-04 09:46:24', 1),
(24, 1, 'Most Intelligent Male', 100, 83, '2024-07-04 09:46:55', '2024-07-04 09:46:55', 1),
(25, 1, 'Most Intelligent Female', 100, 83, '2024-07-04 09:47:19', '2024-07-04 09:47:19', 1),
(26, 1, 'Most Influential Male', 100, 83, '2024-07-04 09:48:06', '2024-07-04 09:48:06', 1),
(27, 1, 'Most Influential Female', 100, 83, '2024-07-04 09:48:28', '2024-07-04 09:48:28', 1),
(28, 1, 'Most Sought After Male', 100, 83, '2024-07-04 09:49:00', '2024-07-04 09:49:00', 1),
(29, 1, 'Most Sought After Female', 100, 83, '2024-07-04 09:49:22', '2024-07-04 09:49:22', 1),
(30, 1, 'Entrepreneur Of The Year', 100, 83, '2024-07-04 09:49:59', '2024-07-04 09:49:59', 1),
(31, 1, 'Best Business Owner', 100, 83, '2024-07-04 09:50:24', '2024-07-04 09:50:24', 1),
(33, 1, 'Fast Rising Business Of The Year', 100, 83, '2024-07-04 09:52:21', '2024-07-04 09:52:21', 1),
(34, 1, 'Best Clique (female)', 100, 83, '2024-07-04 10:33:54', '2024-07-04 10:33:54', 1),
(35, 1, 'Best Clique (Male)', 100, 83, '2024-07-04 10:36:34', '2024-07-04 10:36:34', 1),
(36, 1, 'Best Hairstylist', 100, 83, '2024-07-09 08:25:23', '2024-07-09 08:25:23', 1),
(37, 1, 'Best Fashion Designer', 100, 83, '2024-07-09 08:26:43', '2024-07-09 08:26:43', 1),
(38, 1, 'Best Shoemaker', 100, 83, '2024-07-09 08:27:05', '2024-07-09 08:27:05', 1),
(39, 1, 'Best Baker', 100, 83, '2024-07-09 08:28:00', '2024-07-09 08:28:00', 1),
(40, 1, 'Best Photographer', 100, 83, '2024-07-09 08:29:34', '2024-07-09 08:29:34', 1),
(41, 1, 'Best DJ', 100, 83, '2024-07-09 08:32:04', '2024-07-09 08:32:04', 1),
(42, 3, 'Cain Jordan', 205, 2033, '2024-07-31 18:18:39', '2024-07-31 18:18:39', 7);

-- --------------------------------------------------------

--
-- Table structure for table `contest_nominees`
--

CREATE TABLE `contest_nominees` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint NOT NULL,
  `academic_session` int NOT NULL,
  `vote_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `votes` bigint NOT NULL DEFAULT '0',
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_status` enum('approved','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contest_nominees`
--

INSERT INTO `contest_nominees` (`id`, `user_id`, `name`, `category_id`, `academic_session`, `vote_link`, `votes`, `slug`, `created_at`, `updated_at`, `payment_status`) VALUES
(1, 1, 'lawis10', 4, 1, NULL, 0, NULL, '2024-08-01 12:19:13', '2024-08-01 12:19:13', 'approved'),
(2, 1, 'lawal111', 39, 1, 'http://localhost:8050/vote/lawal111', 0, 'lawal111', '2024-08-01 12:40:28', '2024-08-01 12:40:28', 'approved'),
(3, 72, 'idriss', 31, 1, NULL, 0, NULL, '2024-08-02 08:39:55', '2024-08-02 08:39:55', 'approved'),
(4, 72, 'idriss', 31, 1, 'http://localhost:8050/vote/idriss', 0, 'idriss', '2024-08-02 08:40:40', '2024-08-02 08:40:40', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `contest_votes`
--

CREATE TABLE `contest_votes` (
  `id` bigint NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint NOT NULL,
  `candidate_id` bigint NOT NULL,
  `vote_number` int NOT NULL DEFAULT '0',
  `amount` int NOT NULL DEFAULT '0',
  `payment_status` enum('pending','approved') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `election_aspirants`
--

CREATE TABLE `election_aspirants` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` bigint NOT NULL,
  `academic_session` int NOT NULL,
  `votes` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_status` enum('approved','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `election_aspirants`
--

INSERT INTO `election_aspirants` (`id`, `user_id`, `name`, `position_id`, `academic_session`, `votes`, `created_at`, `updated_at`, `payment_status`) VALUES
(18, 73, 'lawis10', 27, 2, 0, '2024-07-30 00:12:13', '2024-07-30 00:12:13', 'approved'),
(19, 83, 'Nnemeka', 21, 3, 68, '2024-07-31 17:44:53', '2024-07-31 17:44:53', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `election_positions`
--

CREATE TABLE `election_positions` (
  `id` bigint NOT NULL,
  `academic_session_id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_amt` int NOT NULL DEFAULT '0',
  `admin_id` bigint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `positioning` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `election_positions`
--

INSERT INTO `election_positions` (`id`, `academic_session_id`, `name`, `form_amt`, `admin_id`, `created_at`, `updated_at`, `positioning`) VALUES
(1, 1, 'Mr & Mrs NABAMS', 4000, 72, '2024-07-04 09:11:05', '2024-07-04 09:11:05', 1),
(2, 1, 'Honorable Member ND', 4000, 72, '2024-07-04 09:19:45', '2024-07-04 09:19:45', 1),
(3, 1, 'Honorable Member HND', 4000, 72, '2024-07-04 09:20:51', '2024-07-04 09:20:51', 1),
(4, 1, 'Chief Whip', 5000, 72, '2024-07-04 09:23:19', '2024-07-04 09:23:19', 1),
(5, 1, 'Liberian 2', 4000, 72, '2024-07-04 09:24:06', '2024-07-04 09:24:06', 1),
(6, 1, 'Chief Liberian', 5000, 72, '2024-07-04 09:30:29', '2024-07-04 09:30:29', 1),
(7, 1, 'P.R.O 2', 4000, 72, '2024-07-04 09:32:04', '2024-07-04 09:32:04', 1),
(8, 1, 'P.R.O 1', 7000, 72, '2024-07-04 09:32:30', '2024-07-04 09:32:30', 1),
(9, 1, 'Internal Auditor 2', 6000, 72, '2024-07-04 09:33:13', '2024-07-04 09:33:13', 1),
(10, 1, 'Internal Auditor 1', 7000, 72, '2024-07-04 09:33:41', '2024-07-04 09:33:41', 1),
(11, 1, 'Sport Director 2', 6000, 72, '2024-07-04 09:34:46', '2024-07-04 09:34:46', 1),
(12, 1, 'Sport Director 1', 7000, 72, '2024-07-04 09:35:04', '2024-07-04 09:35:04', 1),
(13, 1, 'Welfare Director 2', 6000, 72, '2024-07-04 09:40:13', '2024-07-04 09:40:13', 1),
(14, 1, 'Welfare Director 1', 7000, 72, '2024-07-04 09:43:57', '2024-07-04 09:43:57', 1),
(15, 1, 'Deputy Speaker', 6000, 72, '2024-07-04 09:46:27', '2024-07-04 09:46:27', 1),
(16, 1, 'Speaker', 10000, 72, '2024-07-04 09:46:47', '2024-07-04 09:46:47', 1),
(17, 1, 'Financial Secretary', 6000, 72, '2024-07-04 09:47:28', '2024-07-04 09:47:28', 1),
(18, 1, 'Treasurer', 10000, 72, '2024-07-04 09:47:52', '2024-07-04 09:47:52', 1),
(19, 1, 'ASST. GEN. Secretary', 7000, 72, '2024-07-04 09:48:53', '2024-07-04 09:48:53', 1),
(20, 1, 'General Secretary', 8000, 72, '2024-07-04 09:49:47', '2024-07-04 09:49:47', 1),
(21, 1, 'Vice President', 7000, 72, '2024-07-04 09:50:19', '2024-07-04 09:50:19', 1),
(22, 1, 'President', 10000, 72, '2024-07-04 09:50:36', '2024-07-04 09:50:36', 1),
(23, 1, 'Tech & Maintenance', 3000, 72, '2024-07-04 09:56:26', '2024-07-04 09:59:48', 24),
(24, 1, 'positioning', 7000, 83, '2024-07-09 08:38:01', '2024-07-28 16:27:02', 2),
(25, 1, 'Social Director 2', 6000, 83, '2024-07-09 08:39:02', '2024-07-09 08:39:02', 1),
(26, 1, 'form_amt', 10000, 2033, '2024-07-28 16:34:26', '2024-07-28 16:34:46', 92),
(27, 2, 'President', 1000, 2033, '2024-07-28 18:56:45', '2024-07-28 18:56:45', 1),
(28, 1, 'President 5', 5000, 2033, '2024-07-29 17:44:11', '2024-07-29 17:44:11', 1),
(29, 3, 'VP', 2000, 1, '2024-07-29 22:19:31', '2024-07-29 22:19:31', 1),
(30, 2, 'post Mara Burt', 22, 2033, '2024-07-31 17:44:16', '2024-07-31 17:44:16', 41);

-- --------------------------------------------------------

--
-- Table structure for table `election_votes`
--

CREATE TABLE `election_votes` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `position_id` bigint NOT NULL,
  `aspirant_id` bigint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `election_votes`
--

INSERT INTO `election_votes` (`id`, `user_id`, `position_id`, `aspirant_id`, `created_at`, `updated_at`, `ip_address`) VALUES
(5, 1, 3, 18, '2024-07-31 18:03:47', '2024-07-31 18:03:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_projects`
--

CREATE TABLE `final_projects` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `level_id` int NOT NULL DEFAULT '2',
  `topic1` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic2` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic3` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_num` int NOT NULL DEFAULT '0',
  `supervisor_topic` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_submit` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_projects`
--

INSERT INTO `final_projects` (`id`, `user_id`, `level_id`, `topic1`, `topic2`, `topic3`, `approve_num`, `supervisor_topic`, `has_submit`, `created_at`, `updated_at`) VALUES
(67, 1, 1, 'Irure sed hic maiore', 'Ex officiis modi mol', 'Omnis quod voluptate', 0, 'new Ex officiis modi mol', 'Yes', '2024-08-04 12:13:11', '2024-08-04 12:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `is_active` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `is_active`) VALUES
(1, 'ND1', 'Yes'),
(2, 'ND2', 'Yes'),
(3, 'ND3', 'Yes'),
(4, 'HND1', 'Yes'),
(5, 'HND2', 'Yes'),
(6, 'HND3', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int NOT NULL,
  `permission` varchar(255) NOT NULL,
  `role_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission`, `role_id`) VALUES
(7648, 'home/index', 1),
(7649, 'account/index', 1),
(7650, 'account/edit', 1),
(7651, 'academicsessions/view', 1),
(7652, 'academicsessions/add', 1),
(7653, 'academicsessions/edit', 1),
(7654, 'academicsessions/delete', 1),
(7655, 'academicsessions/importdata', 1),
(7656, 'contestcategories/view', 1),
(7657, 'contestcategories/add', 1),
(7658, 'contestcategories/edit', 1),
(7659, 'contestcategories/delete', 1),
(7660, 'contestcategories/importdata', 1),
(7661, 'contestnominees/view', 1),
(7662, 'contestnominees/add', 1),
(7663, 'contestnominees/edit', 1),
(7664, 'contestnominees/delete', 1),
(7665, 'contestnominees/importdata', 1),
(7666, 'contestvotes/view', 1),
(7667, 'contestvotes/add', 1),
(7668, 'contestvotes/edit', 1),
(7669, 'contestvotes/delete', 1),
(7670, 'contestvotes/importdata', 1),
(7671, 'electionaspirants/view', 1),
(7672, 'electionaspirants/add', 1),
(7673, 'electionaspirants/edit', 1),
(7674, 'electionaspirants/delete', 1),
(7675, 'electionaspirants/importdata', 1),
(7676, 'electionpositions/view', 1),
(7677, 'electionpositions/add', 1),
(7678, 'electionpositions/edit', 1),
(7679, 'electionpositions/delete', 1),
(7680, 'electionpositions/importdata', 1),
(7681, 'electionvotes/view', 1),
(7682, 'electionvotes/add', 1),
(7683, 'electionvotes/edit', 1),
(7684, 'electionvotes/delete', 1),
(7685, 'electionvotes/importdata', 1),
(7686, 'finalprojects/view', 1),
(7687, 'finalprojects/add', 1),
(7688, 'finalprojects/edit', 1),
(7689, 'finalprojects/delete', 1),
(7690, 'finalprojects/importdata', 1),
(7691, 'levels/view', 1),
(7692, 'levels/add', 1),
(7693, 'levels/edit', 1),
(7694, 'levels/delete', 1),
(7695, 'levels/importdata', 1),
(7696, 'pricesettings/view', 1),
(7697, 'pricesettings/add', 1),
(7698, 'pricesettings/edit', 1),
(7699, 'pricesettings/delete', 1),
(7700, 'pricesettings/importdata', 1),
(7701, 'projectsupervisors/view', 1),
(7702, 'projectsupervisors/add', 1),
(7703, 'projectsupervisors/edit', 1),
(7704, 'projectsupervisors/delete', 1),
(7705, 'projectsupervisors/importdata', 1),
(7706, 'resourcecategories/view', 1),
(7707, 'resourcecategories/add', 1),
(7708, 'resourcecategories/edit', 1),
(7709, 'resourcecategories/delete', 1),
(7710, 'resourcecategories/importdata', 1),
(7711, 'resourceitems/view', 1),
(7712, 'resourceitems/add', 1),
(7713, 'resourceitems/edit', 1),
(7714, 'resourceitems/delete', 1),
(7715, 'resourceitems/importdata', 1),
(7716, 'resourcespaids/view', 1),
(7717, 'resourcespaids/add', 1),
(7718, 'resourcespaids/edit', 1),
(7719, 'resourcespaids/delete', 1),
(7720, 'resourcespaids/importdata', 1),
(7721, 'supervisorusers/view', 1),
(7722, 'supervisorusers/add', 1),
(7723, 'supervisorusers/edit', 1),
(7724, 'supervisorusers/delete', 1),
(7725, 'supervisorusers/importdata', 1),
(7726, 'transactions/view', 1),
(7727, 'transactions/add', 1),
(7728, 'transactions/edit', 1),
(7729, 'transactions/delete', 1),
(7730, 'transactions/importdata', 1),
(7731, 'users/view', 1),
(7732, 'users/add', 1),
(7733, 'users/edit', 1),
(7734, 'users/delete', 1),
(7735, 'users/importdata', 1),
(7736, 'webabouts/view', 1),
(7737, 'webabouts/add', 1),
(7738, 'webabouts/edit', 1),
(7739, 'webabouts/delete', 1),
(7740, 'webabouts/importdata', 1),
(7741, 'webbenefits/view', 1),
(7742, 'webbenefits/add', 1),
(7743, 'webbenefits/edit', 1),
(7744, 'webbenefits/delete', 1),
(7745, 'webbenefits/importdata', 1),
(7746, 'webcolours/view', 1),
(7747, 'webcolours/edit', 1),
(7748, 'webcolours/delete', 1),
(7749, 'webcolours/importdata', 1),
(7750, 'webcontacts/view', 1),
(7751, 'webcontacts/add', 1),
(7752, 'webcontacts/edit', 1),
(7753, 'webcontacts/delete', 1),
(7754, 'webcontacts/importdata', 1),
(7755, 'webcounters/view', 1),
(7756, 'webcounters/add', 1),
(7757, 'webcounters/edit', 1),
(7758, 'webcounters/delete', 1),
(7759, 'webcounters/importdata', 1),
(7760, 'webctas/view', 1),
(7761, 'webctas/add', 1),
(7762, 'webctas/edit', 1),
(7763, 'webctas/delete', 1),
(7764, 'webctas/importdata', 1),
(7765, 'webevents/view', 1),
(7766, 'webevents/add', 1),
(7767, 'webevents/edit', 1),
(7768, 'webevents/delete', 1),
(7769, 'webevents/importdata', 1),
(7770, 'webexcos/view', 1),
(7771, 'webexcos/add', 1),
(7772, 'webexcos/edit', 1),
(7773, 'webexcos/delete', 1),
(7774, 'webexcos/importdata', 1),
(7775, 'webgalleries/view', 1),
(7776, 'webgalleries/add', 1),
(7777, 'webgalleries/edit', 1),
(7778, 'webgalleries/delete', 1),
(7779, 'webgalleries/importdata', 1),
(7780, 'webheaders/view', 1),
(7781, 'webheaders/add', 1),
(7782, 'webheaders/edit', 1),
(7783, 'webheaders/delete', 1),
(7784, 'webheaders/importdata', 1),
(7785, 'webregistrations/view', 1),
(7786, 'webregistrations/add', 1),
(7787, 'webregistrations/edit', 1),
(7788, 'webregistrations/delete', 1),
(7789, 'webregistrations/importdata', 1),
(7790, 'webresources/view', 1),
(7791, 'webresources/add', 1),
(7792, 'webresources/edit', 1),
(7793, 'webresources/delete', 1),
(7794, 'webresources/importdata', 1),
(7795, 'websettings/view', 1),
(7796, 'websettings/add', 1),
(7797, 'websettings/edit', 1),
(7798, 'websettings/delete', 1),
(7799, 'websettings/importdata', 1),
(7800, 'websliders/view', 1),
(7801, 'websliders/add', 1),
(7802, 'websliders/edit', 1),
(7803, 'websliders/delete', 1),
(7804, 'websliders/importdata', 1),
(7805, 'webtestimonials/view', 1),
(7806, 'webtestimonials/add', 1),
(7807, 'webtestimonials/edit', 1),
(7808, 'webtestimonials/delete', 1),
(7809, 'webtestimonials/importdata', 1),
(7810, 'webtopbars/view', 1),
(7811, 'webtopbars/edit', 1),
(7812, 'webtopbars/delete', 1),
(7813, 'webtopbars/importdata', 1),
(7814, 'webvissions/view', 1),
(7815, 'webvissions/add', 1),
(7816, 'webvissions/edit', 1),
(7817, 'webvissions/delete', 1),
(7818, 'webvissions/importdata', 1),
(7819, 'academicsessions/index', 1),
(7820, 'appsettings/index', 1),
(7821, 'appsettings/view', 1),
(7822, 'appsettings/add', 1),
(7823, 'appsettings/edit', 1),
(7824, 'appsettings/delete', 1),
(7825, 'contestcategories/index', 1),
(7826, 'contestnominees/index', 1),
(7827, 'contestvotes/index', 1),
(7828, 'electionaspirants/index', 1),
(7829, 'electionpositions/index', 1),
(7830, 'electionvotes/index', 1),
(7831, 'finalprojects/index', 1),
(7832, 'levels/index', 1),
(7833, 'pricesettings/index', 1),
(7834, 'projectsupervisors/index', 1),
(7835, 'resourcecategories/index', 1),
(7836, 'resourceitems/index', 1),
(7837, 'resourceitems/list_pdfs', 1),
(7838, 'resourceitems/list_videos', 1),
(7839, 'resourceitems/add_pdfs', 1),
(7840, 'resourceitems/add_videos', 1),
(7841, 'resourceitems/member_list', 1),
(7842, 'resourceitems/edit_pdf', 1),
(7843, 'resourceitems/edit_video', 1),
(7844, 'resourcespaids/index', 1),
(7845, 'supervisorusers/index', 1),
(7846, 'transactions/index', 1),
(7847, 'transactions/member_list', 1),
(7848, 'users/index', 1),
(7849, 'webabouts/index', 1),
(7850, 'webbenefits/index', 1),
(7851, 'webcolours/index', 1),
(7852, 'webcontacts/index', 1),
(7853, 'webcounters/index', 1),
(7854, 'webctas/index', 1),
(7855, 'webevents/index', 1),
(7856, 'webexcos/index', 1),
(7857, 'webgalleries/index', 1),
(7858, 'webheaders/index', 1),
(7859, 'webregistrations/index', 1),
(7860, 'webresources/index', 1),
(7861, 'websettings/index', 1),
(7862, 'websliders/index', 1),
(7863, 'webtestimonials/index', 1),
(7864, 'webtopbars/index', 1),
(7865, 'webvissions/index', 1),
(7866, 'permissions/index', 1),
(7867, 'permissions/view', 1),
(7868, 'permissions/add', 1),
(7869, 'permissions/edit', 1),
(7870, 'permissions/delete', 1),
(7871, 'roles/index', 1),
(7872, 'roles/view', 1),
(7873, 'roles/add', 1),
(7874, 'roles/edit', 1),
(7875, 'roles/delete', 1),
(7876, 'allpermissions/index', 1),
(7877, 'allpermissions/view', 1),
(7878, 'allpermissions/add', 1),
(7879, 'allpermissions/edit', 1),
(7880, 'allpermissions/delete', 1),
(7881, 'election_vote_page/index', 1),
(7882, 'transactions/member_view', 1),
(7883, 'electionaspirants/member_list', 1),
(7884, 'electionpositions/member_list', 1),
(7885, 'contestcategories/category_list', 1),
(7886, 'contestnominees/nominees_list', 1),
(7887, 'finalprojects/member_add', 1),
(7888, 'finalprojects/member_list', 1),
(7889, 'my_topic/index', 1),
(7890, 'home/index', 4),
(7891, 'account/index', 4),
(7892, 'account/edit', 4),
(7893, 'contestvotes/add', 4),
(7894, 'electionvotes/add', 4),
(7895, 'academicsessions/index', 4),
(7896, 'contestcategories/index', 4),
(7897, 'contestnominees/index', 4),
(7898, 'contestvotes/index', 4),
(7899, 'electionpositions/index', 4),
(7900, 'electionvotes/index', 4),
(7901, 'finalprojects/index', 4),
(7902, 'levels/index', 4),
(7903, 'pricesettings/index', 4),
(7904, 'projectsupervisors/index', 4),
(7905, 'resourcecategories/index', 4),
(7906, 'resourceitems/member_list', 4),
(7907, 'resourcespaids/index', 4),
(7908, 'supervisorusers/index', 4),
(7909, 'transactions/member_list', 4),
(7910, 'users/index', 4),
(7911, 'webabouts/index', 4),
(7912, 'webbenefits/index', 4),
(7913, 'webcolours/index', 4),
(7914, 'webcontacts/index', 4),
(7915, 'webcounters/index', 4),
(7916, 'webctas/index', 4),
(7917, 'webevents/index', 4),
(7918, 'webexcos/index', 4),
(7919, 'webgalleries/index', 4),
(7920, 'webheaders/index', 4),
(7921, 'webregistrations/index', 4),
(7922, 'webresources/index', 4),
(7923, 'websettings/index', 4),
(7924, 'websliders/index', 4),
(7925, 'webtestimonials/index', 4),
(7926, 'webtopbars/index', 4),
(7927, 'webvissions/index', 4),
(7928, 'election_vote_page/index', 4),
(7929, 'transactions/member_view', 4),
(7930, 'electionaspirants/member_list', 4),
(7931, 'electionpositions/member_list', 4),
(7932, 'contestcategories/category_list', 4),
(7933, 'contestnominees/nominees_list', 4),
(7934, 'finalprojects/member_add', 4),
(7935, 'finalprojects/member_list', 4),
(7936, 'my_topic/index', 4),
(7937, 'home/index', 3),
(7938, 'account/index', 3),
(7939, 'account/edit', 3),
(7940, 'projectsupervisors/view', 3),
(7941, 'projectsupervisors/add', 3),
(7942, 'projectsupervisors/edit', 3),
(7943, 'projectsupervisors/delete', 3),
(7944, 'projectsupervisors/importdata', 3),
(7945, 'academicsessions/index', 3),
(7946, 'appsettings/index', 3),
(7947, 'contestcategories/index', 3),
(7948, 'contestnominees/index', 3),
(7949, 'contestvotes/index', 3),
(7950, 'electionaspirants/index', 3),
(7951, 'electionpositions/index', 3),
(7952, 'electionvotes/index', 3),
(7953, 'finalprojects/index', 3),
(7954, 'levels/index', 3),
(7955, 'permissions/index', 3),
(7956, 'permissions/view', 3),
(7957, 'permissions/add', 3),
(7958, 'permissions/edit', 3),
(7959, 'permissions/delete', 3),
(7960, 'pricesettings/index', 3),
(7961, 'projectsupervisors/index', 3),
(7962, 'resourcecategories/index', 3),
(7963, 'resourceitems/index', 3),
(7964, 'resourcespaids/index', 3),
(7965, 'roles/index', 3),
(7966, 'roles/view', 3),
(7967, 'roles/add', 3),
(7968, 'roles/edit', 3),
(7969, 'roles/delete', 3),
(7970, 'supervisorusers/index', 3),
(7971, 'transactions/index', 3),
(7972, 'users/index', 3),
(7973, 'webabouts/index', 3),
(7974, 'webbenefits/index', 3),
(7975, 'webcolours/index', 3),
(7976, 'webcontacts/index', 3),
(7977, 'webcounters/index', 3),
(7978, 'webctas/index', 3),
(7979, 'webevents/index', 3),
(7980, 'webexcos/index', 3),
(7981, 'webgalleries/index', 3),
(7982, 'webheaders/index', 3),
(7983, 'webregistrations/index', 3),
(7984, 'webresources/index', 3),
(7985, 'websettings/index', 3),
(7986, 'websliders/index', 3),
(7987, 'webtestimonials/index', 3),
(7988, 'webtopbars/index', 3),
(7989, 'webvissions/index', 3),
(7990, 'allpermissions/index', 3),
(7991, 'allpermissions/view', 3),
(7992, 'allpermissions/add', 3),
(7993, 'allpermissions/edit', 3),
(7994, 'allpermissions/delete', 3),
(7995, 'election_vote_page/index', 3),
(7996, 'transactions/member_view', 3),
(7997, 'electionaspirants/member_list', 3),
(7998, 'electionpositions/member_list', 3),
(7999, 'contestcategories/category_list', 3),
(8000, 'contestnominees/nominees_list', 3),
(8001, 'finalprojects/member_add', 3),
(8002, 'finalprojects/member_list', 3),
(8003, 'my_topic/index', 3),
(8004, 'home/index', 2),
(8005, 'finalprojects/member_add', 2),
(8006, 'finalprojects/member_list', 2),
(8007, 'account/edit', 2),
(8008, 'account/index', 2),
(8009, 'transactions/member_list', 2),
(8010, 'transactions/member_view', 2),
(8011, 'resourceitems/member_list', 2),
(8012, 'electionaspirants/member_list', 2),
(8013, 'electionpositions/member_list', 2),
(8014, 'election_vote_page/index', 2),
(8015, 'contestcategories/category_list', 2),
(8016, 'contestnominees/nominees_list', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_settings`
--

CREATE TABLE `price_settings` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL DEFAULT '0',
  `accademic_session_id` int NOT NULL DEFAULT '1',
  `level_id` int NOT NULL DEFAULT '1',
  `is_active` set('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_settings`
--

INSERT INTO `price_settings` (`id`, `name`, `amount`, `accademic_session_id`, `level_id`, `is_active`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Association due for First Semester ND1 - 2023/2024', 500, 1, 1, 'Yes', '2024-07-21 23:56:20', '2024-07-22 01:02:14', 1),
(2, 'Association due for First Semester HND1 - 2023/2024', 2000, 1, 4, 'Yes', '2024-07-21 23:56:20', '2024-07-21 23:59:56', 1),
(4, 'Association due for First Semester ND2 - 2023/2024', 1500, 1, 1, 'Yes', '2024-07-21 23:56:20', '2024-07-22 00:03:38', 1),
(5, 'Association due for First Semester HND2 - 2023/2024', 1500, 1, 4, 'Yes', '2024-07-21 23:56:20', '2024-07-22 00:03:44', 1),
(6, 'Association due for Second Semester All Levels - 2023/2024', 500, 1, 1, 'Yes', '2024-07-21 23:56:20', '2024-07-22 00:05:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_supervisors`
--

CREATE TABLE `project_supervisors` (
  `id` bigint NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_supervisors`
--

INSERT INTO `project_supervisors` (`id`, `name`, `phone`, `created_at`, `updated_at`, `is_active`, `email`, `other`) VALUES
(5, 'Mr Sabitu Olalekan', '08029055195', '2024-05-04 17:29:45', '2024-05-13 09:56:51', 'Yes', 'sabituolalekan@gmail.com', 'ag HEAD OF DEPARTMENT (BUS/ADMIIN.)'),
(6, 'Mr Avoseh Segun', '812324422', '2024-05-04 17:29:45', '2024-05-19 15:02:58', 'Yes', 'D@GMAIL.COM', NULL),
(7, 'Mr Ajetumobi Lukmon', '812324422', '2024-05-04 17:29:45', '2024-05-12 05:58:59', 'Yes', 'email@gmail.com', NULL),
(8, 'Mr Ajose Akeem', '08056161921', '2024-05-04 17:29:45', '2024-05-13 11:25:33', 'Yes', 'ajoseakeem7@gmail.com', 'sud Dean SBMS'),
(9, 'Mr Ogunmodede kehinde', '812324422', '2024-05-04 17:29:45', '2024-05-19 15:02:54', 'Yes', 'D@GMAIL.COM', NULL),
(10, 'Mr Ogunleye Eniola', '09056429961', '2024-05-04 17:29:45', '2024-05-13 11:28:32', 'Yes', 'eniolaadoral@gmail.com', NULL),
(11, 'Mr Akingbade Waliu', '812324422', '2024-05-04 17:29:45', '2024-05-19 15:02:51', 'Yes', 'D@GMAIL.COM', NULL),
(13, 'Mr Odusanya', '0802261095', '2024-05-04 17:29:45', '2024-05-13 11:41:11', 'Yes', 'sunkanmiodusaya@gmail.com', NULL),
(14, 'Dr  Alaka N.S', '08035837910', '2024-05-04 17:29:45', '2024-05-13 11:39:11', 'Yes', 'sabituolalekan@gmail.com', NULL),
(16, 'MRS DIPEOLU', '812324422', '2024-05-04 17:29:45', '2024-05-19 15:02:48', 'Yes', 'D@GMAIL.COM', NULL),
(17, 'DR ALAKA N.S', '08035837910', '2024-05-04 17:29:45', '2024-05-16 15:02:14', 'Yes', 'sabituolalekan@gmail.com', NULL),
(18, 'DR ADENIRAN ADEMOLA', '08034107198', '2024-05-04 17:29:45', '2024-05-16 15:11:15', 'Yes', 'adeniranademola820@gmail.com', NULL),
(19, 'MR TAIWO & MR SABITU', '812324422', '2024-05-04 17:29:45', '2024-05-19 15:02:43', 'Yes', 'D@GMAIL.COM', NULL),
(20, 'MR, ADEGBITE', '812324422', '2024-05-04 17:29:45', '2024-05-19 15:02:38', 'Yes', 'D@GMAIL.COM', NULL),
(21, 'DR. OMOARE', '812324422', '2024-05-04 17:29:45', '2024-05-19 15:02:33', 'Yes', 'D@GMAIL.COM', NULL),
(22, 'MR. OPEPLUWA', '812324422', '2024-05-04 17:29:45', '2024-05-19 15:02:28', 'Yes', 'D@GMAIL.COM', NULL),
(23, 'MR. TAIWO', '0786767556', '2024-05-12 17:56:30', '2024-05-12 17:56:30', 'Yes', 'B@GMAIL.COM', NULL),
(24, 'MR. AKINREMI', '9089767675', '2024-05-12 17:57:31', '2024-05-12 17:57:31', 'Yes', 'D@GMAIL.COM', NULL),
(25, 'MR. CHUKS', '099765797', '2024-05-12 17:58:09', '2024-05-12 17:58:09', 'Yes', 'C@GMAIL.COM', NULL),
(26, 'MR. OSHINEYE', '5664357795', '2024-05-12 17:58:54', '2024-05-12 17:58:54', 'Yes', 'S@GMAIL.COM', NULL),
(27, 'MRS. BANKOLE', '4322214', '2024-05-12 17:59:50', '2024-05-12 17:59:50', 'Yes', 'BB@GMAIL.COM', NULL),
(28, 'MR. ADEWALE', '765635587', '2024-05-12 18:00:57', '2024-05-12 18:00:57', 'Yes', 'A@GMAIL.COM', NULL),
(29, 'Mr Obanla', '0000000000', '2024-07-11 14:38:08', '2024-07-11 14:38:08', 'Yes', 'obanla@gmail.com', NULL),
(30, 'Lawal Toheeb', '08132712715', '2024-07-28 14:29:47', '2024-07-28 14:29:47', 'Yes', 'lawal@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resources_paids`
--

CREATE TABLE `resources_paids` (
  `id` int NOT NULL,
  `user_id` bigint NOT NULL,
  `resources_id` bigint NOT NULL,
  `amount` int NOT NULL,
  `payment_status` enum('pending','approved') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `download_counts` int DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_categories`
--

CREATE TABLE `resource_categories` (
  `id` int NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resource_categories`
--

INSERT INTO `resource_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TextBook', '2024-04-20 13:04:24', '2024-04-20 13:04:24'),
(2, 'Past Questions', '2024-04-20 13:05:35', '2024-04-20 13:05:35'),
(3, 'Note book', '2024-04-20 13:05:35', '2024-04-20 13:05:35'),
(4, 'Others', '2024-04-22 12:44:15', '2024-04-22 12:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `resource_items`
--

CREATE TABLE `resource_items` (
  `id` bigint NOT NULL,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `price` int DEFAULT NULL,
  `file_type` enum('image','pdf','videos') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pdf',
  `download_count` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `published` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resource_items`
--

INSERT INTO `resource_items` (`id`, `title`, `description`, `file_path`, `category_id`, `price`, `file_type`, `download_count`, `created_at`, `updated_at`, `published`) VALUES
(1, 'Cum laudantium perf', 'Ullamco nostrum aper', 'uploads/files/c3203807-729e-4f5b-85ec-23518bffc550.png', 2, NULL, 'image', 0, '2024-07-28 09:24:48', '2024-07-28 10:05:48', 'Yes'),
(2, 'Eos ullam sed Nam co', 'Voluptatem Odit ita', 'uploads/files/4a204ab7-30ed-401e-8c68-d8e42312f240.pdf', 1, 500, 'pdf', 0, '2024-07-28 10:36:51', '2024-07-28 10:36:51', 'Yes'),
(3, 'Aliqua Dolore qui v', 'Aliquip temporibus b', 'uploads/files/007c01f4-7df0-44d7-bbd2-b624cc830087.mp4', 4, 391, 'videos', 0, '2024-07-28 10:38:41', '2024-07-28 10:38:41', 'Yes'),
(4, 'Quia facere cupidita', 'Laborum Totam dolor', 'uploads/files/e84487bc-34eb-4009-8fb2-bebf54a142e7.mp3', 1, 980, 'videos', 0, '2024-07-28 10:42:08', '2024-07-28 10:42:08', 'Yes'),
(5, 'Aute proident eos', 'Est temporibus eum', 'uploads/files/b95070ab-b317-4138-832b-82930698843b.jpg', 3, 769, 'image', 0, '2024-07-28 10:58:06', '2024-07-28 11:04:40', 'No'),
(6, 'Sunt corporis ipsam', 'Et consequuntur omni', 'uploads/files/96af3ef5-dd70-4cb6-ae1d-70a590b5c161.pdf', 1, NULL, 'pdf', 0, '2024-07-28 13:10:10', '2024-07-28 13:10:10', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'Lecturer'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_users`
--

CREATE TABLE `supervisor_users` (
  `id` bigint NOT NULL,
  `supervisor_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `admin_id` bigint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `price_settings_id` int NOT NULL DEFAULT '1',
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','Success','Failed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `authorization_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callback_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_response` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `purpose_name` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `price_settings_id`, `email`, `amount`, `fullname`, `phone_number`, `reference`, `created_at`, `status`, `updated_at`, `authorization_url`, `callback_url`, `gateway_response`, `paid_at`, `channel`, `message`, `orderId`, `other_info`, `purpose_name`) VALUES
(1, 2033, 1, 'surepackagingco@gmail.com', 500, 'Porter Wade', '0811741516', '03feb2ff-9cf2-424d-9f72-1491c890909c', '2024-07-22 23:39:41', 'Success', '2024-07-23 14:28:04', 'https://checkout.nomba.com/pay/03feb2ff-9cf2-424d-9f72-1491c890909c', 'http://localhost:8000/payment_callback', '', '2024-07-23 14:28:04', '', 'PAYMENT SUCCESSFUL', NULL, '{\"code\":\"00\",\"description\":\"success\",\"data\":{\"success\":true,\"message\":\"PAYMENT SUCCESSFUL\",\"order\":{\"orderId\":\"03feb2ff-9cf2-424d-9f72-1491c890909c\",\"orderReference\":\"a61242a5-2e4a-49c5-a0b5-f6b4d2c74e4f\",\"customerId\":\"\",\"accountId\":\"b1f98aeb-3ee8-4c4e-a944-7a7d879a93be\",\"callbackUrl\":\"http://localhost:8000/payment_callback\",\"customerEmail\":\"surepackagingco@gmail.com\",\"amount\":\"507.00\",\"currency\":\"NGN\"},\"transactionDetails\":{\"transactionDate\":\"2024-07-22T23:42:38.274Z\",\"paymentReference\":\"100004240722234232117081277693\",\"paymentVendorReference\":\"100004240722234232117081277693\",\"tokenizedCardPayment\":false,\"statusCode\":\"\"},\"transferDetails\":{\"sessionId\":\"100004240722234232117081277693\",\"beneficiaryAccountName\":\"Sure Plastic Enterprise\",\"beneficiaryAccountNumber\":\"3667148649\",\"originatorAccountName\":\"TOHEEB SEGUN LAWAL\",\"originatorAccountNumber\":\"08132712715\",\"narration\":\"lawal testing\",\"destinationInstitutionCode\":\"090645\",\"paymentReference\":\"100004240722234232117081277693\"},\"cardDetails\":null}}', ''),
(2, 1, 1, 'surepackagingco@gmail.com2', 500, 'lawal Hollad', '0811741516', '03feb2ff-9cf2-424d-9f72-1491c890909c', '2024-07-22 23:39:41', 'Success', '2024-07-23 14:28:04', 'https://checkout.nomba.com/pay/03feb2ff-9cf2-424d-9f72-1491c890909c', 'http://localhost:8000/payment_callback', '', '2024-07-23 14:28:04', '', 'PAYMENT SUCCESSFUL', NULL, '{\"code\":\"00\",\"description\":\"success\",\"data\":{\"success\":true,\"message\":\"PAYMENT SUCCESSFUL\",\"order\":{\"orderId\":\"03feb2ff-9cf2-424d-9f72-1491c890909c\",\"orderReference\":\"a61242a5-2e4a-49c5-a0b5-f6b4d2c74e4f\",\"customerId\":\"\",\"accountId\":\"b1f98aeb-3ee8-4c4e-a944-7a7d879a93be\",\"callbackUrl\":\"http://localhost:8000/payment_callback\",\"customerEmail\":\"surepackagingco@gmail.com\",\"amount\":\"507.00\",\"currency\":\"NGN\"},\"transactionDetails\":{\"transactionDate\":\"2024-07-22T23:42:38.274Z\",\"paymentReference\":\"100004240722234232117081277693\",\"paymentVendorReference\":\"100004240722234232117081277693\",\"tokenizedCardPayment\":false,\"statusCode\":\"\"},\"transferDetails\":{\"sessionId\":\"100004240722234232117081277693\",\"beneficiaryAccountName\":\"Sure Plastic Enterprise\",\"beneficiaryAccountNumber\":\"3667148649\",\"originatorAccountName\":\"TOHEEB SEGUN LAWAL\",\"originatorAccountNumber\":\"08132712715\",\"narration\":\"lawal testing\",\"destinationInstitutionCode\":\"090645\",\"paymentReference\":\"100004240722234232117081277693\"},\"cardDetails\":null}}', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matno` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int DEFAULT '1',
  `member_type` enum('Regular','Alumni','Part-time') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Regular',
  `expectation_msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `session_start` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_end` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `is_ban` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `fee_paid` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `role` enum('Member','Admin','Lecturer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Member',
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dob` date DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `x_link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `user_role_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `nickname`, `email`, `password`, `matno`, `phone`, `level_id`, `member_type`, `expectation_msg`, `session_start`, `session_end`, `created_at`, `updated_at`, `is_active`, `is_ban`, `fee_paid`, `role`, `bio`, `dob`, `image`, `facebook_link`, `x_link`, `linkedin_link`, `email_verified_at`, `user_role_id`) VALUES
(1, 'lawal', 'Holland', NULL, 'surepackagingco@gmail2.com', '$2y$10$0wUCmPkfTSGo2gu1p7iLfeUQT.yDuKiE6xRGXvnAt2Pmon966oqmy', '12/124/2204', '08195397916', 1, 'Regular', 'Fugiat aspernatur e', '500', NULL, '2024-04-30 15:28:57', '2024-08-03 23:33:49', 'No', 'No', 'No', 'Member', NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-01 02:16:18', 2),
(15, 'Nasimfp', 'Solomonf55', 'lawis30', 'juki@mailinator.com', '$2y$10$TZJx.DG.xhtJjfTgx2AaC.GdXPasr/9sYNeD0vZlno6tbi6YwJbJm', '12/124/221', '08145858571', 1, 'Regular', 'Aute in animi facil', '2500', NULL, '2024-03-31 14:49:28', '2024-08-02 20:48:19', 'No', 'No', 'No', 'Admin', 'i am a cool guy3331', '2024-04-12', 'profile_images/1795131603114472.png', NULL, NULL, NULL, NULL, 2),
(72, 'Idris', 'Adams', NULL, 'ogitechnabamsleads@gmail.com', '$2y$10$SsI/QvNyvaCLns8M/onDTuBry.SHsgUYRQ1x8Ypx1qRvJzUBfpfj6', '12/124/223', '08091624640', 1, 'Regular', NULL, '0', NULL, '2024-04-30 19:37:50', '2024-08-02 20:48:19', 'No', 'No', 'No', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(73, 'lawal', 'Victor', NULL, 'lawalthb2@gmail.com', '$2y$10$6opHHXqK5Ye.9/iLekdnfemAxaV9jjbU0vuLdbxScbYftd4Xrpk9O', NULL, '08132712715', 1, 'Regular', NULL, '500', NULL, '2024-04-30 19:41:49', '2024-08-02 20:48:19', 'No', 'No', 'No', 'Member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(83, 'Nnaemeka', 'Chidera Miracle', NULL, 'Chidera3310@gmail.com', '$2y$10$M3Bwek1Lqi705qRpGBMeHO6.U3U7FS2dyJFeV/fDmRZTMyTP0tEUm', NULL, '08161410427', 1, 'Regular', NULL, '0', NULL, '2024-05-03 10:09:47', '2024-08-02 20:48:19', 'No', 'No', 'No', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(2033, 'Wade', 'Porter', NULL, 'surepackagingco@gmail.com', '$2y$10$39J7shtGPKR2SbAAB739FOstszvj0xh0kuMoG9Vaz/dovdDVZ7enS', NULL, '0811741516', 1, 'Regular', 'Irure aliquam sit al', NULL, NULL, '2024-07-22 23:39:38', '2024-08-02 21:03:50', 'No', 'No', 'No', 'Member', NULL, NULL, 'uploads/files/021a7ad9-127e-45ae-b3d0-1916f7cf0ef3.jpg', NULL, NULL, NULL, '2024-07-23 14:28:05', 1),
(2034, 'Zachary', 'Chavez', 'Heather Dean', 'zygu@mailinator.com', '$2y$10$yGM6yjeNzEJRC6CHMvufmueV1tOjxg5VQPV/diRL8OSDvALoTUZmi', 'Quibusdam hic id qu', '0833172164', 3, 'Regular', NULL, '2022-06-02', '2024-08-01', '2024-08-02 18:50:03', '2024-08-02 20:48:19', 'No', 'No', 'No', 'Member', NULL, NULL, 'uploads/files/ca2664f2-a5b3-4b3d-ad44-0118426f67a4.jpg', NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `web_abouts`
--

CREATE TABLE `web_abouts` (
  `id` int NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `custom` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_abouts`
--

INSERT INTO `web_abouts` (`id`, `body`, `image`, `text`, `custom`, `updated_at`, `created_at`, `updated_by`) VALUES
(1, 'NABAMS is established with the vision of fostering excellence in the field of business administration and management, NABAMS is a dynamic organization dedicated to empowering students pursuing these disciplines.\r\nAt NABAMS, we believe in providing a platform for students to network, learn, and grow professionally. Through a wide range of initiatives, including seminars, workshops, competitions, and networking events, we aim to equip our members with the knowledge, skills, and connections necessary to excel in the ever-evolving world of business.\r\nOur association is driven by a passionate team of students, educators, and industry professionals who are committed to supporting the academic and professional development of our members. Whether you\'re a seasoned business student or just starting your journey in the field, NABAMS offers valuable resources, opportunities, and support to help you succeed.', 'website/about/1798028244123286.jpg', 'Welcome to the National Association of Business Administration and Management Students (NABAMS)!', 'testing', '2024-07-27 07:28:39', '2024-04-06 21:30:10', 72);

-- --------------------------------------------------------

--
-- Table structure for table `web_benefits`
--

CREATE TABLE `web_benefits` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `position` int NOT NULL DEFAULT '1',
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_benefits`
--

INSERT INTO `web_benefits` (`id`, `title`, `icon`, `text`, `position`, `image`, `updated_by`, `updated_at`, `created_at`) VALUES
(1, 'Benefit 1 new', 'bx bx-receipt', 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip', 1, 'website/benefit/1797030475454996.jpg', 15, '2024-04-22 09:30:10', '2024-04-07 01:50:24'),
(2, 'Benefit 2', 'bx bx-receipt', 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip', 1, 'website/benefit/image1.png', 15, '2024-07-21 16:44:55', '2024-04-07 01:51:06'),
(3, 'Benefit 3', 'bx bx-images', 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip', 1, 'website/benefit/image1.png', 15, '2024-07-21 16:44:59', '2024-04-07 01:51:06'),
(4, 'Benefit 4', 'bx bx-receipt', 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip', 2, 'website/benefit/image1.png', 15, '2024-07-27 07:01:34', '2024-04-07 01:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `web_colours`
--

CREATE TABLE `web_colours` (
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int NOT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_colours`
--

INSERT INTO `web_colours` (`name`, `colour`, `id`, `updated_by`, `updated_at`) VALUES
('fill_colour', '#c246d2', 1, 72, '2024-07-26 19:49:16'),
('main_background', '#fcf8f8', 2, 72, '2024-05-03 15:15:34'),
('text', '#555555', 3, 72, '2024-05-03 15:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `web_contacts`
--

CREATE TABLE `web_contacts` (
  `id` int NOT NULL,
  `email1` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_contacts`
--

INSERT INTO `web_contacts` (`id`, `email1`, `email2`, `phone1`, `phone2`, `address`, `text`, `updated_by`, `updated_at`) VALUES
(1, 'ogitechnabamsleads@gmail.com', 'ogitechnabamsleads@gmail.com', '08091624642', '08161410427', 'Ogun State Institute of Technology, Igbesa Oba Adeshola Market Road P.M.B 2025. Igbesa Ogun State, Nigeria.', 'The below is the contact information for NABAMS, Feel free to contact us through any of these channels for inquiries, support, or membership information.', 72, '2024-07-26 20:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `web_counters`
--

CREATE TABLE `web_counters` (
  `id` int NOT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int DEFAULT '0',
  `text` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_counters`
--

INSERT INTO `web_counters` (`id`, `icon`, `count`, `text`, `position`, `updated_at`, `created_at`, `updated_by`) VALUES
(1, 'fas fa-award', 15, '<strong>Total</strong> Achievements and Awards', 2, '2024-04-07 00:41:49', '2024-04-07 00:58:11', 15),
(2, 'fas fa-award', 15, '<strong>Total</strong> Members', 3, '2024-04-07 00:42:09', '2024-04-07 00:59:35', 15),
(3, 'fas fa-award', 30, '<strong>Total</strong> Total Resources2', 1, '2024-04-07 00:39:03', '2024-04-07 00:59:35', 15),
(4, 'fas fa-award', 15, '<strong>Total</strong> Events', 1, '2024-07-21 16:46:44', '2024-04-07 00:59:35', 15);

-- --------------------------------------------------------

--
-- Table structure for table `web_ctas`
--

CREATE TABLE `web_ctas` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_ctas`
--

INSERT INTO `web_ctas` (`id`, `title`, `text`, `button_text`, `updated_at`, `updated_by`) VALUES
(1, 'Do you want to join NABAMS!!', 'The National Association of Business Administration and Management Student!!', 'Fill Form', '2024-07-27 07:34:44', 72);

-- --------------------------------------------------------

--
-- Table structure for table `web_events`
--

CREATE TABLE `web_events` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_text` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_events`
--

INSERT INTO `web_events` (`id`, `title`, `short_text`, `image`, `long_text`, `updated_by`, `updated_at`, `created_at`, `position`) VALUES
(1, 'Orientation1', '1Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka', 'website/events/1795691798716389.jpg', '1Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero', 15, '2024-04-07 14:52:29', '2024-04-07 14:17:20', 1),
(3, 'Seminars/Workshops2', 'Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka', 'website/events/event2.png', 'Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero', 15, '2024-04-07 14:55:00', '2024-04-07 14:21:05', 1),
(4, 'Competition', 'Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka', 'website/events/event3.png', 'Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero', 15, '2024-04-07 14:21:05', '2024-04-07 14:21:05', 1),
(5, 'Association Event lovely', 'hi Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka', 'website/events/1795715369068757.jpg', 'Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero', 15, '2024-04-07 21:07:07', '2024-04-07 14:21:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_excos`
--

CREATE TABLE `web_excos` (
  `id` int NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_excos`
--

INSERT INTO `web_excos` (`id`, `image`, `name`, `post`, `position`, `updated_at`, `created_at`, `updated_by`) VALUES
(1, 'website/excos/1798029751262056.JPG', 'Comr. Idris Adam Al-illory', 'President', 1, '2024-05-03 11:13:14', '2024-04-07 18:16:36', 72),
(2, 'website/excos/1798029892677931.jpg', 'Comr. Anjorin Gidion', 'Vice President', 1, '2024-05-03 11:15:29', '2024-04-07 18:18:21', 72),
(3, 'website/excos/1798030076682462.jpg', 'Comr. Nnaemeka Chidera', 'General Secretary', 1, '2024-05-03 11:18:24', '2024-04-07 18:18:21', 72),
(4, 'website/excos/1798030167661115.jpg', 'Comr. Alesanmi Nurat', 'Treasurer', 1, '2024-05-03 11:19:52', '2024-04-07 18:18:21', 72);

-- --------------------------------------------------------

--
-- Table structure for table `web_galleries`
--

CREATE TABLE `web_galleries` (
  `id` int NOT NULL,
  `academic_session_id` int NOT NULL,
  `images` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_galleries`
--

INSERT INTO `web_galleries` (`id`, `academic_session_id`, `images`, `position`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 'website/gallery/1798030482918828.jpg', 1, '2024-04-07 18:56:11', 72, '2024-07-26 21:47:46'),
(2, 1, 'website/gallery/1798030524625042.jpg', 1, '2024-04-07 18:56:11', 72, '2024-07-26 21:47:37'),
(3, 1, 'website/gallery/1798030573017672.jpg', 1, '2024-04-07 18:56:11', 72, '2024-07-26 21:47:37'),
(4, 1, 'website/gallery/1798030643286622.JPG', 1, '2024-04-07 18:56:11', 72, '2024-07-26 21:47:37'),
(5, 1, 'website/gallery/1798030750682815.jpg', 1, '2024-04-07 18:56:11', 72, '2024-07-26 21:47:37'),
(6, 1, 'website/gallery/1798030826640920.jpg', 1, '2024-04-07 18:56:11', 72, '2024-07-26 21:47:37'),
(7, 1, 'website/gallery/1798030885411467.jpg', 1, '2024-04-07 18:56:11', 72, '2024-07-26 21:47:37'),
(8, 1, 'website/gallery/1798031005535506.jpg', 1, '2024-04-07 18:56:11', 72, '2024-07-26 21:47:37'),
(9, 1, 'website/gallery/1798031082331063.JPG', 1, '2024-04-07 18:56:11', 72, '2024-07-26 21:47:37'),
(10, 1, 'website/gallery/1798031784411302.jpg', 1, '2024-04-07 18:56:11', 72, '2024-07-26 21:47:37'),
(11, 1, 'uploads/files/9d139b73-c436-4bb8-922b-4ba09851cb1f.jpeg', 1, '2024-07-26 22:00:49', 2033, '2024-07-26 22:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `web_headers`
--

CREATE TABLE `web_headers` (
  `id` int NOT NULL,
  `logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menus` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_headers`
--

INSERT INTO `web_headers` (`id`, `logo`, `site_name`, `menus`, `updated_by`, `updated_at`) VALUES
(1, 'website/site_logo/1798025980325466.jpg', 'NABAMS', 'HOME,\r\nABOUT,\r\nEXCOS,\r\nMEMBERSHIP,\r\nRESOURCES,\r\nARTICLES,\r\nSUPPORT,', 72, '2024-05-03 10:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `web_registrations`
--

CREATE TABLE `web_registrations` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_registrations`
--

INSERT INTO `web_registrations` (`id`, `title`, `text`, `updated_by`, `updated_at`) VALUES
(1, 'REGISTRATION', 'Fill in your Information below for Registration!!', 72, '2024-07-27 06:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `web_resources`
--

CREATE TABLE `web_resources` (
  `id` int NOT NULL,
  `icon` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int NOT NULL DEFAULT '1',
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_resources`
--

INSERT INTO `web_resources` (`id`, `icon`, `title`, `text`, `position`, `updated_by`, `updated_at`, `created_at`) VALUES
(1, 'fas fa-heartbeat', 'Association Constitution1', '1Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 1, 15, '2024-04-07 06:02:03', '2024-04-07 06:36:34'),
(2, 'fas fa-heartbeat', 'Past Questions', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 1, 15, '2024-07-21 16:50:57', '2024-04-07 06:41:51'),
(3, 'fas fa-pills', 'School Handbook', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 1, 15, '2024-07-21 16:50:59', '2024-04-07 06:41:51'),
(4, 'fas fa-notes-medical', 'AOCs, Course Note and Others', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 1, 15, '2024-07-21 16:51:01', '2024-04-07 06:41:51'),
(5, 'fas fa-heartbeat', 'Department Handbook', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 1, 15, '2024-07-21 16:51:04', '2024-04-07 06:41:51'),
(6, 'fas fa-wheelchair', 'Association Minutes', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 1, 15, '2024-07-21 16:51:03', '2024-04-07 06:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` int NOT NULL,
  `top_bar` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vission` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefit` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resources` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excos` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricing` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint NOT NULL,
  `maintenance` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintenance_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `top_bar`, `header`, `slider`, `vission`, `cta`, `about`, `count`, `benefit`, `resources`, `registration`, `event`, `testimonial`, `excos`, `gallery`, `pricing`, `faq`, `contact`, `footer`, `updated_at`, `user_id`, `maintenance`, `maintenance_text`) VALUES
(1, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'off', 'on', 'on', 'on', 'off', 'on', 'on', 'on', 'on', 'on', 'on', '2024-05-19 16:05:19', 72, 'off', 'We will be down for a short time. <br />\r\nPlease check back later.');

-- --------------------------------------------------------

--
-- Table structure for table `web_sliders`
--

CREATE TABLE `web_sliders` (
  `id` int NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_sliders`
--

INSERT INTO `web_sliders` (`id`, `image`, `caption`, `text`, `updated_by`, `updated_at`, `created_at`, `position`) VALUES
(1, 'website/slide/1798026150205763.jpg', 'Welcome to NABAMS', 'Welcome to the National Association of Business Administration and Management Students (NABAMS)!', 72, '2024-05-03 10:16:00', '2024-04-06 06:48:09', 1),
(2, 'website/slide/1798026298395185.JPG', 'NABAMS LEADS', 'Others Follows', 72, '2024-05-03 10:18:21', '2024-04-06 06:48:37', 1),
(3, 'website/slide/1798026461432981.jpg', 'Welcome to NABAMS', 'Welcome to the National Association of Business Administration and Management Students (NABAMS)!', 72, '2024-05-03 10:20:56', '2024-04-06 06:48:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_testimonials`
--

CREATE TABLE `web_testimonials` (
  `id` int NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimony` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `position` int NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_testimonials`
--

INSERT INTO `web_testimonials` (`id`, `name`, `picture`, `testimony`, `position`, `updated_at`, `created_at`, `updated_by`) VALUES
(1, '10Lawal Victor', 'website/testy/1795701477481010.png', '10Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', 1, '2024-04-07 17:26:19', '2024-04-07 16:37:04', 15),
(2, 'John Doe4', 'website/testy/image1.png', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', 1, '2024-04-07 16:59:39', '2024-04-07 16:59:39', 1),
(3, 'John Doe3', 'website/testy/image1.png', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', 1, '2024-04-07 16:59:39', '2024-04-07 16:59:39', 1),
(4, 'John Doe2', 'website/testy/image1.png', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', 1, '2024-04-07 16:59:39', '2024-04-07 16:59:39', 1),
(5, 'John Doe', 'website/testy/image1.png', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', 1, '2024-04-07 16:59:39', '2024-04-07 16:59:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_topbars`
--

CREATE TABLE `web_topbars` (
  `id` int NOT NULL,
  `current_session` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_topbars`
--

INSERT INTO `web_topbars` (`id`, `current_session`, `support_phone`, `updated_by`, `updated_at`) VALUES
(1, '2023-2024', '08091624640', 1, '2024-07-21 16:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `web_vissions`
--

CREATE TABLE `web_vissions` (
  `id` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` bigint NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_vissions`
--

INSERT INTO `web_vissions` (`id`, `name`, `icon`, `text`, `updated_by`, `updated_at`, `created_at`, `position`) VALUES
(1, 'Vission', 'fa fa-low-vision', 'To empower and inspire the next generation of business leaders.', 72, '2024-05-03 10:40:32', '2024-04-06 09:15:30', 1),
(2, 'Mission', 'fas fa-heartbeat', 'To cultivate a dynamic network of future leaders in business administration and management.', 72, '2024-05-03 10:39:19', '2024-04-06 09:15:30', 1),
(3, 'Core Value', 'fa fa-anchor', 'NABAMS core values include principles like professionalism, leadership, integrity, innovation, and continuous learning.', 72, '2024-05-03 10:32:35', '2024-04-06 09:15:30', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_permissions`
--
ALTER TABLE `all_permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contest_categories`
--
ALTER TABLE `contest_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `academic_session_id` (`academic_session_id`);

--
-- Indexes for table `contest_nominees`
--
ALTER TABLE `contest_nominees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `academic_session` (`academic_session`);

--
-- Indexes for table `contest_votes`
--
ALTER TABLE `contest_votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_id` (`candidate_id`),
  ADD KEY `position_id` (`category_id`);

--
-- Indexes for table `election_aspirants`
--
ALTER TABLE `election_aspirants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `academic_session` (`academic_session`);

--
-- Indexes for table `election_positions`
--
ALTER TABLE `election_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_session` (`academic_session_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `election_votes`
--
ALTER TABLE `election_votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_id` (`aspirant_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `final_projects`
--
ALTER TABLE `final_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `price_settings`
--
ALTER TABLE `price_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `accademic_session_id` (`accademic_session_id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `project_supervisors`
--
ALTER TABLE `project_supervisors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `resources_paids`
--
ALTER TABLE `resources_paids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `resources_id` (`resources_id`);

--
-- Indexes for table `resource_categories`
--
ALTER TABLE `resource_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_items`
--
ALTER TABLE `resource_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `supervisor_users`
--
ALTER TABLE `supervisor_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`supervisor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `price_settings_id` (`price_settings_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `level` (`level_id`),
  ADD KEY `user_role_id` (`user_role_id`);

--
-- Indexes for table `web_abouts`
--
ALTER TABLE `web_abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_benefits`
--
ALTER TABLE `web_benefits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_colours`
--
ALTER TABLE `web_colours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_contacts`
--
ALTER TABLE `web_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_counters`
--
ALTER TABLE `web_counters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_ctas`
--
ALTER TABLE `web_ctas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_events`
--
ALTER TABLE `web_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_excos`
--
ALTER TABLE `web_excos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_galleries`
--
ALTER TABLE `web_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `academic_session` (`academic_session_id`);

--
-- Indexes for table `web_headers`
--
ALTER TABLE `web_headers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_registrations`
--
ALTER TABLE `web_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_resources`
--
ALTER TABLE `web_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `web_sliders`
--
ALTER TABLE `web_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_testimonials`
--
ALTER TABLE `web_testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_topbars`
--
ALTER TABLE `web_topbars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `web_vissions`
--
ALTER TABLE `web_vissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `all_permissions`
--
ALTER TABLE `all_permissions`
  MODIFY `permission_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=607;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contest_categories`
--
ALTER TABLE `contest_categories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `contest_nominees`
--
ALTER TABLE `contest_nominees`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contest_votes`
--
ALTER TABLE `contest_votes`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `election_aspirants`
--
ALTER TABLE `election_aspirants`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `election_positions`
--
ALTER TABLE `election_positions`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `election_votes`
--
ALTER TABLE `election_votes`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_projects`
--
ALTER TABLE `final_projects`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8017;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_settings`
--
ALTER TABLE `price_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_supervisors`
--
ALTER TABLE `project_supervisors`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `resources_paids`
--
ALTER TABLE `resources_paids`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_categories`
--
ALTER TABLE `resource_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resource_items`
--
ALTER TABLE `resource_items`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supervisor_users`
--
ALTER TABLE `supervisor_users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=838;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2035;

--
-- AUTO_INCREMENT for table `web_abouts`
--
ALTER TABLE `web_abouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_benefits`
--
ALTER TABLE `web_benefits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web_colours`
--
ALTER TABLE `web_colours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `web_contacts`
--
ALTER TABLE `web_contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_counters`
--
ALTER TABLE `web_counters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web_ctas`
--
ALTER TABLE `web_ctas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_events`
--
ALTER TABLE `web_events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `web_excos`
--
ALTER TABLE `web_excos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web_galleries`
--
ALTER TABLE `web_galleries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `web_headers`
--
ALTER TABLE `web_headers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_registrations`
--
ALTER TABLE `web_registrations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_resources`
--
ALTER TABLE `web_resources`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_sliders`
--
ALTER TABLE `web_sliders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `web_testimonials`
--
ALTER TABLE `web_testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `web_topbars`
--
ALTER TABLE `web_topbars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_vissions`
--
ALTER TABLE `web_vissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contest_categories`
--
ALTER TABLE `contest_categories`
  ADD CONSTRAINT `contest_categories_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contest_categories_ibfk_2` FOREIGN KEY (`academic_session_id`) REFERENCES `academic_sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contest_nominees`
--
ALTER TABLE `contest_nominees`
  ADD CONSTRAINT `contest_nominees_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `contest_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contest_nominees_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contest_nominees_ibfk_3` FOREIGN KEY (`academic_session`) REFERENCES `academic_sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contest_votes`
--
ALTER TABLE `contest_votes`
  ADD CONSTRAINT `contest_votes_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contest_votes_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `contest_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `election_aspirants`
--
ALTER TABLE `election_aspirants`
  ADD CONSTRAINT `election_aspirants_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `election_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `election_aspirants_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `election_aspirants_ibfk_3` FOREIGN KEY (`academic_session`) REFERENCES `academic_sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `election_positions`
--
ALTER TABLE `election_positions`
  ADD CONSTRAINT `election_positions_ibfk_1` FOREIGN KEY (`academic_session_id`) REFERENCES `academic_sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `election_positions_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `election_votes`
--
ALTER TABLE `election_votes`
  ADD CONSTRAINT `election_votes_ibfk_1` FOREIGN KEY (`aspirant_id`) REFERENCES `election_aspirants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `election_votes_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `election_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `election_votes_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `final_projects`
--
ALTER TABLE `final_projects`
  ADD CONSTRAINT `final_projects_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `final_projects_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE;

--
-- Constraints for table `price_settings`
--
ALTER TABLE `price_settings`
  ADD CONSTRAINT `price_settings_ibfk_1` FOREIGN KEY (`accademic_session_id`) REFERENCES `academic_sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `price_settings_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `price_settings_ibfk_3` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resources_paids`
--
ALTER TABLE `resources_paids`
  ADD CONSTRAINT `resources_paids_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resources_paids_ibfk_2` FOREIGN KEY (`resources_id`) REFERENCES `resource_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resource_items`
--
ALTER TABLE `resource_items`
  ADD CONSTRAINT `resource_items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `resource_categories` (`id`);

--
-- Constraints for table `supervisor_users`
--
ALTER TABLE `supervisor_users`
  ADD CONSTRAINT `supervisor_users_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `project_supervisors` (`id`),
  ADD CONSTRAINT `supervisor_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`price_settings_id`) REFERENCES `price_settings` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_role_id`) REFERENCES `roles` (`role_id`) ON DELETE SET NULL;

--
-- Constraints for table `web_abouts`
--
ALTER TABLE `web_abouts`
  ADD CONSTRAINT `web_abouts_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `web_benefits`
--
ALTER TABLE `web_benefits`
  ADD CONSTRAINT `web_benefits_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_colours`
--
ALTER TABLE `web_colours`
  ADD CONSTRAINT `web_colours_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_contacts`
--
ALTER TABLE `web_contacts`
  ADD CONSTRAINT `web_contacts_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_counters`
--
ALTER TABLE `web_counters`
  ADD CONSTRAINT `web_counters_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_ctas`
--
ALTER TABLE `web_ctas`
  ADD CONSTRAINT `web_ctas_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_events`
--
ALTER TABLE `web_events`
  ADD CONSTRAINT `web_events_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_excos`
--
ALTER TABLE `web_excos`
  ADD CONSTRAINT `web_excos_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_galleries`
--
ALTER TABLE `web_galleries`
  ADD CONSTRAINT `web_galleries_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `web_galleries_ibfk_2` FOREIGN KEY (`academic_session_id`) REFERENCES `academic_sessions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_headers`
--
ALTER TABLE `web_headers`
  ADD CONSTRAINT `web_headers_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_registrations`
--
ALTER TABLE `web_registrations`
  ADD CONSTRAINT `web_registrations_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_resources`
--
ALTER TABLE `web_resources`
  ADD CONSTRAINT `web_resources_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD CONSTRAINT `web_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_sliders`
--
ALTER TABLE `web_sliders`
  ADD CONSTRAINT `web_sliders_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_testimonials`
--
ALTER TABLE `web_testimonials`
  ADD CONSTRAINT `web_testimonials_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_topbars`
--
ALTER TABLE `web_topbars`
  ADD CONSTRAINT `web_topbars_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `web_vissions`
--
ALTER TABLE `web_vissions`
  ADD CONSTRAINT `web_vissions_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
