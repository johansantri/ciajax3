-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 05:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth3`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_blog`
--

CREATE TABLE `t_blog` (
  `id_blog` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_categori` int(11) NOT NULL,
  `id_sub_categori` int(11) NOT NULL,
  `create_ad` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_ad` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_ad` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('draft','post','update','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_blog`
--

INSERT INTO `t_blog` (`id_blog`, `title`, `slug`, `meta`, `description`, `tags`, `image`, `id_categori`, `id_sub_categori`, `create_ad`, `update_ad`, `delete_ad`, `id_user`, `status`) VALUES
(1, 'title blog seo', 'title-blog-seo', 'meta seo', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'tags,blog,desain,teknologi', '', 4, 3, '0000-00-00 00:00:00', '2021-03-02 22:50:26', '0000-00-00', 5, 'draft'),
(2, 'how to create title', 'how-to-create-title', 'this meta for description sort', '<p>descriptions on this</p>', 'blog,health,covid', '', 4, 3, '2021-02-25 02:21:42', '2021-02-24 20:01:01', '0000-00-00', 5, 'draft'),
(3, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'meta blog', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'tags,', '', 5, 4, '2021-02-25 02:36:52', '0000-00-00 00:00:00', '0000-00-00', 5, 'draft'),
(4, 'Where does it come from?', 'where-does-it-come-from', 'blog', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'blog', '', 1, 1, '2021-02-25 02:45:23', '2021-02-24 20:21:04', '0000-00-00', 5, 'draft'),
(5, 'Where can I get some?', 'where-can-i-get-some', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n\r\n<table style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\">&nbsp;</td>\r\n			<td rowspan=\"2\">\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"width:20px\">&nbsp;</td>\r\n						<td>paragraphs</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"width:20px\">&nbsp;</td>\r\n						<td>words</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"width:20px\">&nbsp;</td>\r\n						<td>bytes</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"width:20px\">&nbsp;</td>\r\n						<td>lists</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td style=\"width:20px\">&nbsp;</td>\r\n			<td style=\"text-align:left\">Start with &#39;Lorem<br />\r\n			ipsum dolor sit amet...&#39;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td style=\"text-align:left\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'blog,tags,oke tag jadi,siap,mantap', '', 5, 4, '2021-02-25 03:27:47', '2021-03-02 22:52:26', '0000-00-00', 5, 'draft'),
(6, 'blog title', 'blog-title', 'blgo meta', '<p>description blog</p>', 'oke,yes,no,fix', '', 1, 1, '2021-02-25 03:38:55', '2021-02-24 20:04:05', '0000-00-00', 5, 'draft'),
(7, 'title1', 'title1', 'meta1', '<p><br />\r\ndescription1</p>', 'helo,tes,oke,fix', '', 1, 1, '2021-02-25 03:48:37', '2021-02-24 20:23:20', '0000-00-00', 5, 'draft'),
(8, 'title2', 'title2', 'meta2', '<p><br />\r\ndescription2</p>', 'oke,ye,jadi,now', '', 1, 1, '2021-02-25 03:55:58', '2021-02-24 20:06:11', '0000-00-00', 5, 'draft'),
(9, 'title3', 'title3', 'meta3', '<p><br />\r\ndescription3</p>', 'oke,now,yes', '', 1, 2, '2021-02-25 03:58:57', '2021-02-24 20:05:40', '0000-00-00', 5, 'draft'),
(10, 'title4', 'title4', 'meta4', '<p><br />\r\ndescription4</p>', 'tags,tag2,tags3', '', 1, 2, '2021-02-25 04:03:52', '2021-02-24 20:05:49', '0000-00-00', 5, 'draft'),
(11, 'title blog', 'title-blog', 'meta blog', '<p>description blog</p>', 'description blog', '', 1, 1, '2021-02-25 13:32:19', '2021-02-25 13:32:19', '0000-00-00', 5, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE `t_category` (
  `id_category` int(11) NOT NULL,
  `nama_category` varchar(255) NOT NULL,
  `status_category` enum('aktif','tidak_aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_category`
--

INSERT INTO `t_category` (`id_category`, `nama_category`, `status_category`) VALUES
(1, 'teknologi', 'tidak_aktif'),
(2, 'ekonomi', 'aktif'),
(3, 'travel', 'aktif'),
(4, 'helth', 'aktif'),
(5, 'sport', 'aktif'),
(6, 'word', 'aktif'),
(7, 'comedy', 'aktif'),
(8, 'culture', 'aktif'),
(9, 'law', 'aktif'),
(10, 'politic', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_daftar`
--

CREATE TABLE `t_daftar` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` enum('terima','tolak','','') NOT NULL,
  `level` enum('admin','member','super','') NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `terakhir_masuk` date NOT NULL,
  `aturan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_daftar`
--

INSERT INTO `t_daftar` (`id_user`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `email`, `password`, `status`, `level`, `tgl_daftar`, `terakhir_masuk`, `aturan`) VALUES
(5, 'johan', 'ini nama', '1', 'admin@gmail.com', '$2y$10$w9nJuCdpKXi3uNoH.xTmTemjAXaYZdlT9V5dJF2nTdZzxFOo38y0e', 'terima', 'admin', '2021-02-18 14:07:08', '2021-02-18', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `t_sub_category`
--

CREATE TABLE `t_sub_category` (
  `id_sub_category` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `nama_sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sub_category`
--

INSERT INTO `t_sub_category` (`id_sub_category`, `id_category`, `nama_sub`) VALUES
(1, 1, 'Desain'),
(2, 1, 'Gaming'),
(3, 4, 'Covid 19'),
(4, 5, 'Totenham');

-- --------------------------------------------------------

--
-- Table structure for table `t_tokens`
--

CREATE TABLE `t_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tokens`
--

INSERT INTO `t_tokens` (`id`, `token`, `id_user`, `created`) VALUES
(0, '7a50b00f484aef11a70e9b24cb5ff9', 4, '2021-02-18'),
(0, 'e6bd1d233f572f9cd45fd3a013d1cc', 5, '2021-02-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_blog`
--
ALTER TABLE `t_blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `t_daftar`
--
ALTER TABLE `t_daftar`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_sub_category`
--
ALTER TABLE `t_sub_category`
  ADD PRIMARY KEY (`id_sub_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_blog`
--
ALTER TABLE `t_blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_daftar`
--
ALTER TABLE `t_daftar`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_sub_category`
--
ALTER TABLE `t_sub_category`
  MODIFY `id_sub_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
