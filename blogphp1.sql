-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 26 jan. 2021 à 22:55
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blogphp1`
--

-- --------------------------------------------------------

--
-- Structure de la table `cv_chapters`
--

CREATE TABLE `cv_chapters` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `chapi` text NOT NULL,
  `zerolink` text NOT NULL,
  `refreshdate` datetime DEFAULT NULL,
  `author` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cv_chapters`
--

INSERT INTO `cv_chapters` (`id`, `title`, `content`, `date`, `chapi`, `zerolink`, `refreshdate`, `author`, `userid`) VALUES
(154, 'Lorem ipsum 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula eros a imperdiet imperdiet. Pellentesque egestas varius imperdiet. Phasellus sed laoreet dui, id ultricies purus. Cras id scelerisque ipsum. Vivamus suscipit dignissim accumsan. Donec arcu nulla, iaculis ut sodales nec, convallis id urna. Phasellus maximus dignissim enim, quis molestie tortor vestibulum sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed leo leo. Suspendisse imperdiet dapibus arcu, ac bibendum turpis consectetur sit amet.<br /><br />Vivamus et orci sodales, venenatis augue quis, consectetur massa. Quisque sit amet neque id lacus ultricies pulvinar ut bibendum urna. Suspendisse vitae erat et dolor pellentesque maximus. Fusce ac lectus at tellus lobortis iaculis et a nisl. Sed placerat nunc sapien, sit amet scelerisque tellus pharetra id. Morbi nec eros est. In sem nibh, hendrerit sed lectus eget, aliquet vulputate eros. Ut fermentum, ex quis vehicula mattis, dui orci placerat sem, ac egestas neque nunc id neque. Integer vulputate neque et erat tincidunt pulvinar.<br /><br />Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam a turpis sed tortor pellentesque lacinia sollicitudin at magna. Vivamus elementum sollicitudin metus ut rutrum. Ut ut mauris ac nulla aliquet luctus ut eget dui. Sed dignissim faucibus nulla eu tincidunt. Nunc hendrerit velit mauris, quis interdum risus semper ut. Quisque dignissim, lorem et eleifend cursus, erat ipsum iaculis libero, nec tincidunt nibh sapien vitae lectus. Suspendisse porttitor auctor enim pharetra tempus. Ut dignissim nisi eu rhoncus dapibus. Curabitur tempus eros sit amet lectus scelerisque pretium. Donec in lorem vitae mi pretium fringilla in non massa. Praesent sed laoreet nisl, vel tempus nisl. Aliquam euismod posuere quam vel mattis. Sed ultricies hendrerit facilisis. Sed vel nulla elementum, rhoncus purus ornare, mattis libero.<br /><br />Sed et lobortis dolor. Quisque ut nulla risus. Nulla auctor magna at tincidunt rhoncus. Pellentesque viverra mi ut mi gravida, lacinia volutpat elit mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla viverra consectetur mi sit amet sagittis. Nunc in diam eros. Pellentesque accumsan nunc at accumsan bibendum. Suspendisse nec ultricies ex, non laoreet velit.<br /><br />Nullam maximus egestas ante id faucibus. Nulla nibh erat, aliquet eu feugiat et, condimentum in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis euismod leo ac velit hendrerit egestas. Duis vitae lorem ullamcorper, lacinia elit porta, venenatis mi. Etiam bibendum, urna at consequat sodales, augue lorem tempor augue, ultrices venenatis quam dolor quis nibh. Curabitur ac massa id nisl tempus vestibulum a at nisi. Integer id imperdiet quam. Morbi eget nunc lobortis, dignissim sapien at, accumsan arcu. Nulla lobortis lacinia convallis. Praesent semper sapien vel sagittis dignissim.<br /><br />Etiam augue urna, cursus ut mauris ut, semper condimentum urna. Morbi porttitor dolor non quam dictum mollis. Sed ac velit a felis bibendum sagittis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed id vestibulum urna, quis volutpat felis. Mauris consequat iaculis blandit. Maecenas tempor, libero vel pharetra tempus, ipsum diam maximus elit, nec rhoncus nisl ligula vitae massa. Fusce ornare turpis felis, vel malesuada lectus rhoncus lobortis. Phasellus eget arcu nisl.<br /><br />Fusce turpis augue, iaculis eget ex a, fermentum fermentum nibh. Donec hendrerit nunc vel felis ultricies ultrices. Aenean venenatis, ante in semper efficitur, lacus mi pulvinar dui, finibus eleifend turpis orci sed neque. Vivamus et est a lorem efficitur eleifend vitae eget arcu. Donec lobortis augue nec ipsum efficitur, ut consectetur ante bibendum. Nam ut augue at nunc condimentum tempus eget scelerisque felis. Maecenas metus quam, molestie quis suscipit a, tincidunt sit amet dolor. Integer porta lobortis sem, vitae pellentesque ante congue venenatis. Proin aliquet sem nec ipsum eleifend, at iaculis risus accumsan.', '2021-01-21 19:13:07', 'Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'https://1.bp.blogspot.com/-mfuxNbJB5GY/Xdmtgd51v-I/AAAAAAAAA_o/oBeqOU05CXwqT3X79qfHjANpVmUzYKxSQCLcBGAsYHQ/s1600/qsdfghjklm.JPG', '2021-01-24 19:04:18', 'Gogo', 1),
(155, 'Lorem ipsum 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula eros a imperdiet imperdiet. Pellentesque egestas varius imperdiet. Phasellus sed laoreet dui, id ultricies purus. Cras id scelerisque ipsum. Vivamus suscipit dignissim accumsan. Donec arcu nulla, iaculis ut sodales nec, convallis id urna. Phasellus maximus dignissim enim, quis molestie tortor vestibulum sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed leo leo. Suspendisse imperdiet dapibus arcu, ac bibendum turpis consectetur sit amet.<br /><br />Vivamus et orci sodales, venenatis augue quis, consectetur massa. Quisque sit amet neque id lacus ultricies pulvinar ut bibendum urna. Suspendisse vitae erat et dolor pellentesque maximus. Fusce ac lectus at tellus lobortis iaculis et a nisl. Sed placerat nunc sapien, sit amet scelerisque tellus pharetra id. Morbi nec eros est. In sem nibh, hendrerit sed lectus eget, aliquet vulputate eros. Ut fermentum, ex quis vehicula mattis, dui orci placerat sem, ac egestas neque nunc id neque. Integer vulputate neque et erat tincidunt pulvinar.<br /><br />Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam a turpis sed tortor pellentesque lacinia sollicitudin at magna. Vivamus elementum sollicitudin metus ut rutrum. Ut ut mauris ac nulla aliquet luctus ut eget dui. Sed dignissim faucibus nulla eu tincidunt. Nunc hendrerit velit mauris, quis interdum risus semper ut. Quisque dignissim, lorem et eleifend cursus, erat ipsum iaculis libero, nec tincidunt nibh sapien vitae lectus. Suspendisse porttitor auctor enim pharetra tempus. Ut dignissim nisi eu rhoncus dapibus. Curabitur tempus eros sit amet lectus scelerisque pretium. Donec in lorem vitae mi pretium fringilla in non massa. Praesent sed laoreet nisl, vel tempus nisl. Aliquam euismod posuere quam vel mattis. Sed ultricies hendrerit facilisis. Sed vel nulla elementum, rhoncus purus ornare, mattis libero.<br /><br />Sed et lobortis dolor. Quisque ut nulla risus. Nulla auctor magna at tincidunt rhoncus. Pellentesque viverra mi ut mi gravida, lacinia volutpat elit mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla viverra consectetur mi sit amet sagittis. Nunc in diam eros. Pellentesque accumsan nunc at accumsan bibendum. Suspendisse nec ultricies ex, non laoreet velit.<br /><br />Nullam maximus egestas ante id faucibus. Nulla nibh erat, aliquet eu feugiat et, condimentum in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis euismod leo ac velit hendrerit egestas. Duis vitae lorem ullamcorper, lacinia elit porta, venenatis mi. Etiam bibendum, urna at consequat sodales, augue lorem tempor augue, ultrices venenatis quam dolor quis nibh. Curabitur ac massa id nisl tempus vestibulum a at nisi. Integer id imperdiet quam. Morbi eget nunc lobortis, dignissim sapien at, accumsan arcu. Nulla lobortis lacinia convallis. Praesent semper sapien vel sagittis dignissim.<br /><br />Etiam augue urna, cursus ut mauris ut, semper condimentum urna. Morbi porttitor dolor non quam dictum mollis. Sed ac velit a felis bibendum sagittis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed id vestibulum urna, quis volutpat felis. Mauris consequat iaculis blandit. Maecenas tempor, libero vel pharetra tempus, ipsum diam maximus elit, nec rhoncus nisl ligula vitae massa. Fusce ornare turpis felis, vel malesuada lectus rhoncus lobortis. Phasellus eget arcu nisl.<br /><br />Fusce turpis augue, iaculis eget ex a, fermentum fermentum nibh. Donec hendrerit nunc vel felis ultricies ultrices. Aenean venenatis, ante in semper efficitur, lacus mi pulvinar dui, finibus eleifend turpis orci sed neque. Vivamus et est a lorem efficitur eleifend vitae eget arcu. Donec lobortis augue nec ipsum efficitur, ut consectetur ante bibendum. Nam ut augue at nunc condimentum tempus eget scelerisque felis. Maecenas metus quam, molestie quis suscipit a, tincidunt sit amet dolor. Integer porta lobortis sem, vitae pellentesque ante congue venenatis. Proin aliquet sem nec ipsum eleifend, at iaculis risus accumsan.', '2021-01-21 19:16:42', 'Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'https://4.bp.blogspot.com/-GNEXT7gb_Us/XcSd9iNbNVI/AAAAAAAAA9E/jIHstyJCeNkclCT96U4vgwJKqOyi7a08gCLcBGAsYHQ/s1600/EClark_160818_9541.jpg', '2021-01-24 19:04:40', 'Gogo', 1),
(156, 'Lorem ipsum 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula eros a imperdiet imperdiet. Pellentesque egestas varius imperdiet. Phasellus sed laoreet dui, id ultricies purus. Cras id scelerisque ipsum. Vivamus suscipit dignissim accumsan. Donec arcu nulla, iaculis ut sodales nec, convallis id urna. Phasellus maximus dignissim enim, quis molestie tortor vestibulum sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed leo leo. Suspendisse imperdiet dapibus arcu, ac bibendum turpis consectetur sit amet.<br /><br />Vivamus et orci sodales, venenatis augue quis, consectetur massa. Quisque sit amet neque id lacus ultricies pulvinar ut bibendum urna. Suspendisse vitae erat et dolor pellentesque maximus. Fusce ac lectus at tellus lobortis iaculis et a nisl. Sed placerat nunc sapien, sit amet scelerisque tellus pharetra id. Morbi nec eros est. In sem nibh, hendrerit sed lectus eget, aliquet vulputate eros. Ut fermentum, ex quis vehicula mattis, dui orci placerat sem, ac egestas neque nunc id neque. Integer vulputate neque et erat tincidunt pulvinar.<br /><br />Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam a turpis sed tortor pellentesque lacinia sollicitudin at magna. Vivamus elementum sollicitudin metus ut rutrum. Ut ut mauris ac nulla aliquet luctus ut eget dui. Sed dignissim faucibus nulla eu tincidunt. Nunc hendrerit velit mauris, quis interdum risus semper ut. Quisque dignissim, lorem et eleifend cursus, erat ipsum iaculis libero, nec tincidunt nibh sapien vitae lectus. Suspendisse porttitor auctor enim pharetra tempus. Ut dignissim nisi eu rhoncus dapibus. Curabitur tempus eros sit amet lectus scelerisque pretium. Donec in lorem vitae mi pretium fringilla in non massa. Praesent sed laoreet nisl, vel tempus nisl. Aliquam euismod posuere quam vel mattis. Sed ultricies hendrerit facilisis. Sed vel nulla elementum, rhoncus purus ornare, mattis libero.<br /><br />Sed et lobortis dolor. Quisque ut nulla risus. Nulla auctor magna at tincidunt rhoncus. Pellentesque viverra mi ut mi gravida, lacinia volutpat elit mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla viverra consectetur mi sit amet sagittis. Nunc in diam eros. Pellentesque accumsan nunc at accumsan bibendum. Suspendisse nec ultricies ex, non laoreet velit.<br /><br />Nullam maximus egestas ante id faucibus. Nulla nibh erat, aliquet eu feugiat et, condimentum in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis euismod leo ac velit hendrerit egestas. Duis vitae lorem ullamcorper, lacinia elit porta, venenatis mi. Etiam bibendum, urna at consequat sodales, augue lorem tempor augue, ultrices venenatis quam dolor quis nibh. Curabitur ac massa id nisl tempus vestibulum a at nisi. Integer id imperdiet quam. Morbi eget nunc lobortis, dignissim sapien at, accumsan arcu. Nulla lobortis lacinia convallis. Praesent semper sapien vel sagittis dignissim.<br /><br />Etiam augue urna, cursus ut mauris ut, semper condimentum urna. Morbi porttitor dolor non quam dictum mollis. Sed ac velit a felis bibendum sagittis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed id vestibulum urna, quis volutpat felis. Mauris consequat iaculis blandit. Maecenas tempor, libero vel pharetra tempus, ipsum diam maximus elit, nec rhoncus nisl ligula vitae massa. Fusce ornare turpis felis, vel malesuada lectus rhoncus lobortis. Phasellus eget arcu nisl.<br /><br />Fusce turpis augue, iaculis eget ex a, fermentum fermentum nibh. Donec hendrerit nunc vel felis ultricies ultrices. Aenean venenatis, ante in semper efficitur, lacus mi pulvinar dui, finibus eleifend turpis orci sed neque. Vivamus et est a lorem efficitur eleifend vitae eget arcu. Donec lobortis augue nec ipsum efficitur, ut consectetur ante bibendum. Nam ut augue at nunc condimentum tempus eget scelerisque felis. Maecenas metus quam, molestie quis suscipit a, tincidunt sit amet dolor. Integer porta lobortis sem, vitae pellentesque ante congue venenatis. Proin aliquet sem nec ipsum eleifend, at iaculis risus accumsan.', '2021-01-21 19:18:20', 'Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'https://2.bp.blogspot.com/-_FBaIo4JFyw/XcSeG3hv_UI/AAAAAAAAA9k/xz2eR-a9mW8PKdXIJ4P6ErvPPw6LtLoJwCLcBGAsYHQ/s1600/Cote%2BEst%2BNoum%25C3%25A9a.png', '2021-01-24 19:05:11', 'Hector', 3),
(157, 'Lorem ipsum 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula eros a imperdiet imperdiet. Pellentesque egestas varius imperdiet. Phasellus sed laoreet dui, id ultricies purus. Cras id scelerisque ipsum. Vivamus suscipit dignissim accumsan. Donec arcu nulla, iaculis ut sodales nec, convallis id urna. Phasellus maximus dignissim enim, quis molestie tortor vestibulum sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed leo leo. Suspendisse imperdiet dapibus arcu, ac bibendum turpis consectetur sit amet.<br /><br />Vivamus et orci sodales, venenatis augue quis, consectetur massa. Quisque sit amet neque id lacus ultricies pulvinar ut bibendum urna. Suspendisse vitae erat et dolor pellentesque maximus. Fusce ac lectus at tellus lobortis iaculis et a nisl. Sed placerat nunc sapien, sit amet scelerisque tellus pharetra id. Morbi nec eros est. In sem nibh, hendrerit sed lectus eget, aliquet vulputate eros. Ut fermentum, ex quis vehicula mattis, dui orci placerat sem, ac egestas neque nunc id neque. Integer vulputate neque et erat tincidunt pulvinar.<br /><br />Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam a turpis sed tortor pellentesque lacinia sollicitudin at magna. Vivamus elementum sollicitudin metus ut rutrum. Ut ut mauris ac nulla aliquet luctus ut eget dui. Sed dignissim faucibus nulla eu tincidunt. Nunc hendrerit velit mauris, quis interdum risus semper ut. Quisque dignissim, lorem et eleifend cursus, erat ipsum iaculis libero, nec tincidunt nibh sapien vitae lectus. Suspendisse porttitor auctor enim pharetra tempus. Ut dignissim nisi eu rhoncus dapibus. Curabitur tempus eros sit amet lectus scelerisque pretium. Donec in lorem vitae mi pretium fringilla in non massa. Praesent sed laoreet nisl, vel tempus nisl. Aliquam euismod posuere quam vel mattis. Sed ultricies hendrerit facilisis. Sed vel nulla elementum, rhoncus purus ornare, mattis libero.<br /><br />Sed et lobortis dolor. Quisque ut nulla risus. Nulla auctor magna at tincidunt rhoncus. Pellentesque viverra mi ut mi gravida, lacinia volutpat elit mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla viverra consectetur mi sit amet sagittis. Nunc in diam eros. Pellentesque accumsan nunc at accumsan bibendum. Suspendisse nec ultricies ex, non laoreet velit.<br /><br />Nullam maximus egestas ante id faucibus. Nulla nibh erat, aliquet eu feugiat et, condimentum in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis euismod leo ac velit hendrerit egestas. Duis vitae lorem ullamcorper, lacinia elit porta, venenatis mi. Etiam bibendum, urna at consequat sodales, augue lorem tempor augue, ultrices venenatis quam dolor quis nibh. Curabitur ac massa id nisl tempus vestibulum a at nisi. Integer id imperdiet quam. Morbi eget nunc lobortis, dignissim sapien at, accumsan arcu. Nulla lobortis lacinia convallis. Praesent semper sapien vel sagittis dignissim.<br /><br />Etiam augue urna, cursus ut mauris ut, semper condimentum urna. Morbi porttitor dolor non quam dictum mollis. Sed ac velit a felis bibendum sagittis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed id vestibulum urna, quis volutpat felis. Mauris consequat iaculis blandit. Maecenas tempor, libero vel pharetra tempus, ipsum diam maximus elit, nec rhoncus nisl ligula vitae massa. Fusce ornare turpis felis, vel malesuada lectus rhoncus lobortis. Phasellus eget arcu nisl.<br /><br />Fusce turpis augue, iaculis eget ex a, fermentum fermentum nibh. Donec hendrerit nunc vel felis ultricies ultrices. Aenean venenatis, ante in semper efficitur, lacus mi pulvinar dui, finibus eleifend turpis orci sed neque. Vivamus et est a lorem efficitur eleifend vitae eget arcu. Donec lobortis augue nec ipsum efficitur, ut consectetur ante bibendum. Nam ut augue at nunc condimentum tempus eget scelerisque felis. Maecenas metus quam, molestie quis suscipit a, tincidunt sit amet dolor. Integer porta lobortis sem, vitae pellentesque ante congue venenatis. Proin aliquet sem nec ipsum eleifend, at iaculis risus accumsan.', '2021-01-21 19:19:25', 'Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'https://2.bp.blogspot.com/-pRn295Auk6w/XcSeE7EGwkI/AAAAAAAAA9U/AioULsIaDnsGDAbvT6Bcg-FivbFhnlTcQCLcBGAsYHQ/s1600/VZlEy1.jpg', '2021-01-24 19:05:37', 'Anonyme', 3),
(158, 'Lorem ipsum 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula eros a imperdiet imperdiet. Pellentesque egestas varius imperdiet. Phasellus sed laoreet dui, id ultricies purus. Cras id scelerisque ipsum. Vivamus suscipit dignissim accumsan. Donec arcu nulla, iaculis ut sodales nec, convallis id urna. <strong>Phasellus</strong> maximus dignissim enim, <em>quis</em> <span style=\"text-decoration: underline;\">molestie</span> <span style=\"color: #3598db;\">tortor</span> <span style=\"color: #2dc26b;\">vestibulum</span> <span style=\"color: #b96ad9;\">sit</span> <span style=\"color: #e67e23;\">amet</span>. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed leo leo. Suspendisse imperdiet dapibus arcu, ac bibendum turpis consectetur sit amet.<br /><br /><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://1.bp.blogspot.com/-lR39s95U_1o/XdmtY_18TBI/AAAAAAAAA_I/8e8C72nLsTsmyAzj96s3EwIhBQTjwIk0wCLcBGAsYHQ/s1600/2019-01-14-08-28-05-1200x800.jpg\" alt=\"Description\" width=\"250\" height=\"167\" /><br /><br />Vivamus et orci sodales, venenatis augue quis, consectetur massa. Quisque sit amet neque id lacus ultricies pulvinar ut bibendum urna. <span style=\"color: #3598db;\">Suspendisse</span> <span style=\"color: #f1c40f;\">vitae</span> <span style=\"color: #b96ad9;\">erat et</span> <span style=\"color: #e67e23;\">dolor</span> <span style=\"color: #ba372a;\">pellentesque</span> <span style=\"color: #2dc26b;\">maximus</span>. Fusce ac lectus at tellus lobortis iaculis et a nisl. Sed placerat nunc sapien, sit amet scelerisque tellus pharetra id. Morbi nec eros est. In sem nibh, hendrerit sed lectus eget, aliquet vulputate eros. Ut fermentum, ex quis vehicula mattis, dui orci placerat sem, ac egestas neque nunc id neque. Integer vulputate neque et erat tincidunt pulvinar.<br /><br />Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam a turpis sed tortor pellentesque lacinia sollicitudin at magna. Vivamus elementum sollicitudin metus ut rutrum. Ut ut mauris ac nulla aliquet luctus ut eget dui. Sed dignissim faucibus nulla eu tincidunt. Nunc hendrerit velit mauris, quis interdum risus semper ut. Quisque dignissim, lorem et eleifend cursus, erat ipsum iaculis libero, nec tincidunt nibh sapien vitae lectus. Suspendisse porttitor auctor enim pharetra tempus. Ut dignissim nisi eu rhoncus dapibus. Curabitur tempus eros sit amet lectus scelerisque pretium. Donec in lorem vitae mi pretium fringilla in non massa. Praesent sed laoreet nisl, vel tempus nisl. Aliquam euismod posuere quam vel mattis. Sed ultricies hendrerit facilisis. Sed vel nulla elementum, rhoncus purus ornare, mattis libero.<br /><br />Sed et lobortis dolor. Quisque ut nulla risus. Nulla auctor magna at tincidunt rhoncus. Pellentesque viverra mi ut mi gravida, lacinia volutpat elit mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla viverra consectetur mi sit amet sagittis. Nunc in diam eros. Pellentesque accumsan nunc at accumsan bibendum. Suspendisse nec ultricies ex, non laoreet velit.<br /><br />Nullam maximus egestas ante id faucibus. Nulla nibh erat, aliquet eu feugiat et, condimentum in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis euismod leo ac velit hendrerit egestas. Duis vitae lorem ullamcorper, lacinia elit porta, venenatis mi. Etiam bibendum, urna at consequat sodales, augue lorem tempor augue, ultrices venenatis quam dolor quis nibh. Curabitur ac massa id nisl tempus vestibulum a at nisi. Integer id imperdiet quam. Morbi eget nunc lobortis, dignissim sapien at, accumsan arcu. Nulla lobortis lacinia convallis. Praesent semper sapien vel sagittis dignissim.<br /><br />Etiam augue urna, cursus ut mauris ut, semper condimentum urna. Morbi porttitor dolor non quam dictum mollis. Sed ac velit a felis bibendum sagittis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed id vestibulum urna, quis volutpat felis. Mauris consequat iaculis blandit. Maecenas tempor, libero vel pharetra tempus, ipsum diam maximus elit, nec rhoncus nisl ligula vitae massa. Fusce ornare turpis felis, vel malesuada lectus rhoncus lobortis. Phasellus eget arcu nisl.<br /><br />Fusce turpis augue, iaculis eget ex a, fermentum fermentum nibh. Donec hendrerit nunc vel felis ultricies ultrices. Aenean venenatis, ante in semper efficitur, lacus mi pulvinar dui, finibus eleifend turpis orci sed neque. Vivamus et est a lorem efficitur eleifend vitae eget arcu. Donec lobortis augue nec ipsum efficitur, ut consectetur ante bibendum. Nam ut augue at nunc condimentum tempus eget scelerisque felis. Maecenas metus quam, molestie quis suscipit a, tincidunt sit amet dolor. Integer porta lobortis sem, vitae pellentesque ante congue venenatis. Proin aliquet sem nec ipsum eleifend, at iaculis risus accumsan.<br /><br />Suspendisse ut sapien gravida, pellentesque nibh vel, imperdiet dolor. Maecenas ac sagittis sem. Phasellus ligula turpis, pulvinar ac luctus pellentesque, pulvinar vel neque. Morbi scelerisque consequat sapien, nec sollicitudin ex dignissim sit amet. Maecenas ac tempor neque, quis sagittis sapien. Suspendisse neque nunc, maximus finibus est quis, scelerisque volutpat neque. Nam condimentum quam eget ligula iaculis volutpat. Donec efficitur tincidunt orci eget placerat. In vel risus quis felis aliquam finibus quis ut dolor. Praesent accumsan placerat iaculis. Sed erat sapien, dapibus a orci non, laoreet tincidunt tellus. Aenean commodo est ac maximus tincidunt. Sed dui nisl, dictum vitae ex eget, iaculis sodales ipsum. Maecenas vel maximus augue, non euismod massa. Morbi venenatis eu libero ut ultricies.<br /><br />Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam sollicitudin pellentesque libero, non interdum arcu tincidunt sit amet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi nec sem bibendum, pharetra nisl sed, dignissim turpis. Nulla porta eu erat ac efficitur. Phasellus vitae nulla metus. Aliquam erat volutpat. Vivamus et lobortis felis, at eleifend urna. Praesent malesuada luctus dolor, non consectetur nisi tincidunt nec. Nam a mauris ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus.<br /><br />Aliquam enim justo, condimentum dictum aliquam eget, faucibus vitae purus. Sed viverra enim eget velit tincidunt venenatis. Sed libero nisi, mattis sed eleifend in, ultricies a ligula. Aliquam a lobortis orci. Mauris accumsan nunc quis turpis laoreet, vitae suscipit nulla faucibus. Etiam efficitur lorem pellentesque turpis consequat ultrices. In in ante varius, dapibus magna eu, sollicitudin justo. Aliquam ut erat tempus, imperdiet enim eget, eleifend leo. Ut nec pharetra orci, a faucibus diam. Sed a tristique metus. Nunc sed nibh ac eros aliquet tincidunt. Vivamus ac lacinia massa. Integer ac mi vel sem pharetra lobortis. Phasellus tincidunt dapibus dui, at mollis sem elementum eget. Morbi viverra dui ac faucibus placerat. Phasellus dignissim, lacus sit amet imperdiet accumsan, nulla lectus porttitor mauris, vestibulum iaculis ex leo vitae felis.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula eros a imperdiet imperdiet. Pellentesque egestas varius imperdiet. Phasellus sed laoreet dui, id ultricies purus. Cras id scelerisque ipsum. Vivamus suscipit dignissim accumsan. Donec arcu nulla, iaculis ut sodales nec, convallis id urna. Phasellus maximus dignissim enim, quis molestie tortor vestibulum sit amet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed leo leo. Suspendisse imperdiet dapibus arcu, ac bibendum turpis consectetur sit amet.<br /><br />Vivamus et orci sodales, venenatis augue quis, consectetur massa. Quisque sit amet neque id lacus ultricies pulvinar ut bibendum urna. Suspendisse vitae erat et dolor pellentesque maximus. Fusce ac lectus at tellus lobortis iaculis et a nisl. Sed placerat nunc sapien, sit amet scelerisque tellus pharetra id. Morbi nec eros est. In sem nibh, hendrerit sed lectus eget, aliquet vulputate eros. Ut fermentum, ex quis vehicula mattis, dui orci placerat sem, ac egestas neque nunc id neque. Integer vulputate neque et erat tincidunt pulvinar.', '2021-01-21 19:21:30', 'Lorem ipsum sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'https://1.bp.blogspot.com/-DDFNLBwUKrI/XdmtgMEDLHI/AAAAAAAAA_k/jPENe9b1WbAGsBYhLrN9_-MPUpqd3xBlQCLcBGAsYHQ/s1600/paysage-du-montana.jpg', '2021-01-26 21:55:08', 'Marie', 2);

-- --------------------------------------------------------

--
-- Structure de la table `cv_comments`
--

CREATE TABLE `cv_comments` (
  `id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `alarm` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cv_comments`
--

INSERT INTO `cv_comments` (`id`, `chapter_id`, `pseudo`, `comment`, `alarm`, `date`, `email`) VALUES
(144, 158, 'Nicolas', 'Lorem ipsum sed ut perspiciatis unde omnis iste natus error !', 1, '2021-01-21 19:27:08', 'nicolas@gmail.com'),
(145, 158, 'Marion', 'Lorem ipsum sed ut perspiciatis...', 1, '2021-01-21 19:36:48', 'marion@gmail.com'),
(155, 158, 'Vincent', 'Lorem ipsum sed ut !', 0, '2021-01-26 01:19:36', 'vincent@gmail.com'),
(156, 158, 'Jean-Eudes Nouaille-Degorce', 'azeazeazeazeza', 0, '2021-01-26 21:58:40', 'jend94500@yahoo.fr'),
(157, 158, 'Jean-Eudes Nouaille-Degorce', 'zerzrzrzerzerzr', 0, '2021-01-26 21:58:49', 'jend94500@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `cv_managers`
--

CREATE TABLE `cv_managers` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cv_managers`
--

INSERT INTO `cv_managers` (`id`, `user`, `password`, `role`) VALUES
(1, 'gogo', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
(2, 'marie', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
(3, 'hector', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
(60, 'Caroline', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL),
(69, 'jean', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
(71, 'aeazeaz', 'f52463f834586a3695d2c04a6cd6569f53c92a65c27f5e6c7b25842528edb0a6', NULL),
(72, 'marie456', '90242fbe1733e5b6549eeb3149087671689acba940889ce2bfa9e914d0895dc7', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cv_chapters`
--
ALTER TABLE `cv_chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_chapters_ibfk_1` (`userid`);

--
-- Index pour la table `cv_comments`
--
ALTER TABLE `cv_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleId` (`chapter_id`);

--
-- Index pour la table `cv_managers`
--
ALTER TABLE `cv_managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cv_chapters`
--
ALTER TABLE `cv_chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT pour la table `cv_comments`
--
ALTER TABLE `cv_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT pour la table `cv_managers`
--
ALTER TABLE `cv_managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cv_chapters`
--
ALTER TABLE `cv_chapters`
  ADD CONSTRAINT `cv_chapters_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `cv_managers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cv_comments`
--
ALTER TABLE `cv_comments`
  ADD CONSTRAINT `cv_comments_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `cv_chapters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;