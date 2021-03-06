-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2018 at 06:29 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `directoryplus_100`
--

--
-- Dumping data for table `cats`
--

delete from cats;

INSERT INTO `cats` (`id`, `name`, `plural_name`, `cat_slug`, `parent_id`, `cat_icon`, `cat_order`, `cat_status`) VALUES
(1, 'Auto', 'Auto', 'auto', 0, '', 0, 1),
(2, 'Auto Body', 'Auto Body', 'auto-body', 1, '', 0, 1),
(3, 'Auto Dealer', 'Auto Dealers', 'auto-dealer', 1, '', 0, 1),
(4, 'Auto Glass', 'Auto Glass', 'auto-glass', 1, '', 0, 1),
(5, 'Auto Parts', 'Auto Parts', 'auto-parts', 1, '', 0, 1),
(6, 'Auto Repair', 'Auto Repair', 'auto-repair', 1, '', 0, 1),
(7, 'Auto Wrecking', 'Auto Wrecking', 'auto-wrecking', 1, '', 0, 1),
(8, 'Brake Repair', 'Brake Repair', 'brake-repair', 1, '', 0, 1),
(9, 'Car Alarm', 'Car Alarms', 'car-alarm', 1, '', 0, 1),
(10, 'Car Appraisal', 'Car Appraisals', 'car-appraisal', 1, '', 0, 1),
(11, 'Car Stereo', 'Car Stereo', 'car-stereo', 1, '', 0, 1),
(12, 'Car Wash', 'Car Washes', 'car-wash', 1, '', 0, 1),
(13, 'Gas Station', 'Gas Stations', 'gas-station', 1, '', 0, 1),
(14, 'Motorcycle Accessories', 'Motorcycle Accessories', 'motorcycle-accessories', 1, '', 0, 1),
(15, 'Motorcycle Dealer', 'Motorcycle Dealers', 'motorcycle-dealer', 1, '', 0, 1),
(16, 'Motorcycle Parts', 'Motorcycle Parts', 'motorcycle-parts', 1, '', 0, 1),
(17, 'Motorcycle Repair', 'Motorcycle Repair', 'motorcycle-repair', 1, '', 0, 1),
(18, 'Motorhomes', 'Motorhomes', 'motorhomes', 1, '', 0, 1),
(19, 'Oil Change', 'Oil Change', 'oil-change', 1, '', 0, 1),
(20, 'Tires', 'Tires', 'tires', 1, '', 0, 1),
(21, 'Towing', 'Towing', 'towing', 1, '', 0, 1),
(22, 'Trailers', 'Trailers', 'trailers', 1, '', 0, 1),
(23, 'Truck Dealer', 'Truck Dealers', 'truck-dealer', 1, '', 0, 1),
(24, 'Truck Parts', 'Truck Parts', 'truck-parts', 1, '', 0, 1),
(25, 'Truck Rental', 'Truck Rental', 'truck-rental', 1, '', 0, 1),
(26, 'Truck Repair', 'Truck Repair', 'truck-repair', 1, '', 0, 1),
(27, 'Wheels & Rims', 'Wheels & Rims', 'wheels-rims', 1, '', 0, 1),
(28, 'Other Autos', 'Other Autos', 'other-autos', 1, '', 1, 1),
(29, 'Bar & Restaurant', 'Bars & Restaurants', 'bar-restaurant', 0, '', 0, 1),
(30, 'Bar', 'Bars', 'bar', 29, '', 0, 1),
(31, 'Cafe', 'Cafes', 'cafe', 29, '', 0, 1),
(32, 'Chinese Restaurant', 'Chinese Restaurants', 'chinese-restaurant', 29, '', 0, 1),
(33, 'Cocktail Lounge', 'Cocktail Lounges', 'cocktail-lounge', 29, '', 0, 1),
(34, 'Coffee', 'Coffees', 'coffee', 29, '', 0, 1),
(35, 'Family Restaurant', 'Family Restaurants', 'family-restaurant', 29, '', 0, 1),
(36, 'Fast Food Restaurant', 'Fast Food Restaurants', 'fast-food-restaurant', 29, '', 0, 1),
(37, 'French Restaurant', 'French Restaurants', 'french-restaurant', 29, '', 0, 1),
(38, 'Indian Restaurant', 'Indian Restaurants', 'indian-restaurant', 29, '', 0, 1),
(39, 'Internet Cafe', 'Internet Cafes', 'internet-cafe', 29, '', 0, 1),
(40, 'Italian Restaurant', 'Italian Restaurants', 'italian-restaurant', 29, '', 0, 1),
(41, 'Japanese Restaurant', 'Japanese Restaurants', 'japanese-restaurant', 29, '', 0, 1),
(42, 'Lounge', 'Lounges', 'lounge', 29, '', 0, 1),
(43, 'Mexican Restaurant', 'Mexican Restaurants', 'mexican-restaurant', 29, '', 0, 1),
(44, 'Pizza', 'Pizza', 'pizza', 29, '', 0, 1),
(45, 'Pub', 'Pubs', 'pub', 29, '', 0, 1),
(46, 'Seafood Restaurant', 'Seafood Restaurants', 'seafood-restaurant', 29, '', 0, 1),
(47, 'Sports Bar', 'Sports Bars', 'sports-bar', 29, '', 0, 1),
(48, 'Steak Restaurant', 'Steak Restaurants', 'steak-restaurant', 29, '', 0, 1),
(49, 'Take Out', 'Take Out', 'take-out', 29, '', 0, 1),
(50, 'Tavern', 'Taverns', 'tavern', 29, '', 0, 1),
(51, 'Tea House', 'Tea Houses', 'tea-house', 29, '', 0, 1),
(52, 'Thai Restaurant', 'Thai Restaurants', 'thai-restaurant', 29, '', 0, 1),
(53, 'Vegetarian Restaurant', 'Vegetarian Restaurants', 'vegetarian-restaurant', 29, '', 0, 1),
(54, 'Wine Bar', 'Wine Bars', 'wine-bar', 29, '', 0, 1),
(55, 'Winery', 'Wineries', 'winery', 29, '', 0, 1),
(56, 'Other Bar & Restaurant', 'Other Bars & Restaurants', 'other-bar-restaurant', 29, '', 1, 1),
(57, 'Beauty', 'Beauty', 'beauty', 0, '', 0, 1),
(58, 'Barber', 'Barbers', 'barber', 57, '', 0, 1),
(59, 'Beauty Consultant', 'Beauty Consultants', 'beauty-consultant', 57, '', 0, 1),
(60, 'Beauty Supplies', 'Beauty Supplies', 'beauty-supplies', 57, '', 0, 1),
(61, 'Body Piercing', 'Body Piercing', 'body-piercing', 57, '', 0, 1),
(62, 'Day Spa', 'Day Spas', 'day-spa', 57, '', 0, 1),
(63, 'Facial Spa', 'Facial Spas', 'facial-spa', 57, '', 0, 1),
(64, 'Hair Removal', 'Hair Removal', 'hair-removal', 57, '', 0, 1),
(65, 'Hair Restoration', 'Hair Restoration', 'hair-restoration', 57, '', 0, 1),
(66, 'Hair Salon', 'Hair Salons', 'hair-salon', 57, '', 0, 1),
(67, 'Make-Up', 'Make-Up', 'make-up', 57, '', 0, 1),
(68, 'Massage', 'Massage', 'massage', 57, '', 0, 1),
(69, 'Nail Salon', 'Nail Salons', 'nail-salon', 57, '', 0, 1),
(70, 'Pedicure', 'Pedicures', 'pedicure', 57, '', 0, 1),
(71, 'Skin Care', 'Skin Care', 'skin-care', 57, '', 0, 1),
(72, 'Tattoo', 'Tattoos', 'tattoo', 57, '', 0, 1),
(73, 'Other Beauty', 'Other Beauty', 'other-beauty', 57, '', 1, 1),
(74, 'Computer', 'Computers', 'computer', 0, '', 0, 1),
(75, 'Computer Consultant', 'Computer Consultants', 'computer-consultant', 74, '', 0, 1),
(76, 'Computer Games', 'Computer Games', 'computer-games', 74, '', 0, 1),
(77, 'Computer Networking', 'Computer Networking', 'computer-networking', 74, '', 0, 1),
(78, 'Computer Rental', 'Computer Rental', 'computer-rental', 74, '', 0, 1),
(79, 'Computer Repair', 'Computer Repair', 'computer-repair', 74, '', 0, 1),
(80, 'Computer Store', 'Computer Stores', 'computer-store', 74, '', 0, 1),
(81, 'Video Game', 'Video Games', 'video-game', 74, '', 0, 1),
(82, 'Other Computer', 'Other Computers', 'other-computer', 74, '', 1, 1),
(83, 'Diet & Health', 'Diet & Health', 'diet-health', 0, '', 0, 1),
(84, 'Diet Foods', 'Diet Foods', 'diet-foods', 83, '', 0, 1),
(85, 'Nutritionist', 'Nutritionists', 'nutritionist', 83, '', 0, 1),
(86, 'Vitamins', 'Vitamins', 'vitamins', 83, '', 0, 1),
(87, 'Other Diet & Health', 'Other Diet & Health', 'other-diet-health', 83, '', 1, 1),
(88, 'Electronic', 'Electronics', 'electronic', 0, '', 0, 1),
(89, 'Cable TV', 'Cable TV', 'cable-tv', 88, '', 0, 1),
(90, 'Camera', 'Cameras', 'camera', 88, '', 0, 1),
(91, 'Cell Phone', 'Cell Phones', 'cell-phone', 88, '', 0, 1),
(92, 'Digital Camera', 'Digital Cameras', 'digital-camera', 88, '', 0, 1),
(93, 'Electronics Store', 'Electronics Stores', 'electronics-store', 88, '', 0, 1),
(94, 'HiFi', 'HiFi', 'hifi', 88, '', 0, 1),
(95, 'Home Theater', 'Home Theater', 'home-theater', 88, '', 0, 1),
(96, 'Phone', 'Phones', 'phone', 88, '', 0, 1),
(97, 'Satellite TV', 'Satellite TV', 'satellite-tv', 88, '', 0, 1),
(98, 'Other Eletronic', 'Other Eletronics', 'other-eletronic', 88, '', 1, 1),
(99, 'Entertainment', 'Entertainment', 'entertainment', 0, '', 0, 1),
(100, 'Art Gallery', 'Art Galleries', 'art-gallery', 99, '', 0, 1),
(101, 'Ballet', 'Ballet', 'ballet', 99, '', 0, 1),
(102, 'Bingo', 'Bingo', 'bingo', 99, '', 0, 1),
(103, 'Casino', 'Casinos', 'casino', 99, '', 0, 1),
(104, 'DVD Rental', 'DVD Rental', 'dvd-rental', 99, '', 0, 1),
(105, 'Escort Service', 'Escort Services', 'escort-service', 99, '', 0, 1),
(106, 'Movie Rental', 'Movie Rental', 'movie-rental', 99, '', 0, 1),
(107, 'Movie Theater', 'Movie Theaters', 'movie-theater', 99, '', 0, 1),
(108, 'Museum', 'Museums', 'museum', 99, '', 0, 1),
(109, 'Night Club', 'Night Clubs', 'night-club', 99, '', 0, 1),
(110, 'Orchestra', 'Orchestras', 'orchestra', 99, '', 0, 1),
(111, 'Stage Theater', 'Stage Theaters', 'stage-theater', 99, '', 0, 1),
(112, 'Other Entertainment', 'Other Entertainment', 'other-entertainment', 99, '', 1, 1),
(113, 'Finance', 'Finance', 'finance', 0, '', 0, 1),
(114, 'Accountant', 'Accountants', 'accountant', 113, '', 0, 1),
(115, 'Auto Loan', 'Auto Loans', 'auto-loan', 113, '', 0, 1),
(116, 'Bank', 'Banks', 'bank', 113, '', 0, 1),
(117, 'Bookkeeping', 'Bookkeeping', 'bookkeeping', 113, '', 0, 1),
(118, 'Check Cashing', 'Check Cashing', 'check-cashing', 113, '', 0, 1),
(119, 'Credit Card', 'Credit Cards', 'credit-card', 113, '', 0, 1),
(120, 'Credit Counseling', 'Credit Counseling', 'credit-counseling', 113, '', 0, 1),
(121, 'Credit Report', 'Credit Reports', 'credit-report', 113, '', 0, 1),
(122, 'Credit Union', 'Credit Unions', 'credit-union', 113, '', 0, 1),
(123, 'Home Loan', 'Home Loans', 'home-loan', 113, '', 0, 1),
(124, 'Mortgage', 'Mortgages', 'mortgage', 113, '', 0, 1),
(125, 'Motorcycle Loan', 'Motorcycle Loans', 'motorcycle-loan', 113, '', 0, 1),
(126, 'Mutual Fund', 'Mutual Funds', 'mutual-fund', 113, '', 0, 1),
(127, 'Personal Loan', 'Personal Loans', 'personal-loan', 113, '', 0, 1),
(128, 'Stock Broker', 'Stock Brokers', 'stock-broker', 113, '', 0, 1),
(129, 'Student Loan', 'Student Loans', 'student-loan', 113, '', 0, 1),
(130, 'Tax Preparation', 'Tax Preparation', 'tax-preparation', 113, '', 0, 1),
(131, 'Wealth Management', 'Wealth Management', 'wealth-management', 113, '', 0, 1),
(132, 'Other Finance', 'Other Finance', 'other-finance', 113, '', 1, 1),
(133, 'Fitness', 'Fitness', 'fitness', 0, '', 0, 1),
(134, 'Aerobics', 'Aerobics', 'aerobics', 133, '', 0, 1),
(135, 'Exercise Equipment', 'Exercise Equipment', 'exercise-equipment', 133, '', 0, 1),
(136, 'Fitness Center', 'Fitness Centers', 'fitness-center', 133, '', 0, 1),
(137, 'Fitness Clothing', 'Fitness Clothing', 'fitness-clothing', 133, '', 0, 1),
(138, 'Gym', 'Gyms', 'gym', 133, '', 0, 1),
(139, 'Health Club', 'Health Clubs', 'health-club', 133, '', 0, 1),
(140, 'Personal Trainer', 'Personal Trainers', 'personal-trainer', 133, '', 0, 1),
(141, 'Pilates', 'Pilates', 'pilates', 133, '', 0, 1),
(142, 'Yoga', 'Yoga', 'yoga', 133, '', 0, 1),
(143, 'Other Fitness', 'Other Fitness', 'other-fitness', 133, '', 1, 1),
(144, 'Home', 'Home', 'home', 0, '', 0, 1),
(145, 'Antiques', 'Antiques', 'antiques', 144, '', 0, 1),
(146, 'Blind', 'Blinds', 'blind', 144, '', 0, 1),
(147, 'Building Contractor', 'Building Contractors', 'building-contractor', 144, '', 0, 1),
(148, 'Carpenter', 'Carpenters', 'carpenter', 144, '', 0, 1),
(149, 'Carpet Cleaning', 'Carpet Cleaning', 'carpet-cleaning', 144, '', 0, 1),
(150, 'Contractor', 'Contractors', 'contractor', 144, '', 0, 1),
(151, 'Curtain', 'Curtains', 'curtain', 144, '', 0, 1),
(152, 'Flooring', 'Flooring', 'flooring', 144, '', 0, 1),
(153, 'Furniture', 'Furniture', 'furniture', 144, '', 0, 1),
(154, 'Gardening', 'Gardening', 'gardening', 144, '', 0, 1),
(155, 'Granite', 'Granite', 'granite', 144, '', 0, 1),
(156, 'Hardware', 'Hardware', 'hardware', 144, '', 0, 1),
(157, 'Heater', 'Heaters', 'heater', 144, '', 0, 1),
(158, 'House Cleaning', 'House Cleaning', 'house-cleaning', 144, '', 0, 1),
(159, 'Insulation', 'Insulation', 'insulation', 144, '', 0, 1),
(160, 'Interior Design', 'Interior Design', 'interior-design', 144, '', 0, 1),
(161, 'Landscaping', 'Landscaping', 'landscaping', 144, '', 0, 1),
(162, 'Lighting', 'Lighting', 'lighting', 144, '', 0, 1),
(163, 'Locksmith', 'Locksmiths', 'locksmith', 144, '', 0, 1),
(164, 'Lumber', 'Lumbers', 'lumber', 144, '', 0, 1),
(165, 'Marble', 'Marble', 'marble', 144, '', 0, 1),
(166, 'Paint', 'Paint', 'paint', 144, '', 0, 1),
(167, 'Paving Contractor', 'Paving Contractors', 'paving-contractor', 144, '', 0, 1),
(168, 'Plumber', 'Plumbers', 'plumber', 144, '', 0, 1),
(169, 'Remodeling', 'Remodeling', 'remodeling', 144, '', 0, 1),
(170, 'Roofing', 'Roofing', 'roofing', 144, '', 0, 1),
(171, 'Sand & Gravel', 'Sand & Gravel', 'sand-gravel', 144, '', 0, 1),
(172, 'Swimming Pool Service', 'Swimming Pool Service', 'swimming-pool-service', 144, '', 0, 1),
(173, 'Upholstery', 'Upholstery', 'upholstery', 144, '', 0, 1),
(174, 'Window', 'Windows', 'window', 144, '', 0, 1),
(175, 'Other Home', 'Other Home', 'other-home', 144, '', 1, 1),
(176, 'Insurance', 'Insurance', 'insurance', 0, '', 0, 1),
(177, 'Accident Insurance', 'Accident Insurance', 'accident-insurance', 176, '', 0, 1),
(178, 'Auto Insurance', 'Auto Insurance', 'auto-insurance', 176, '', 0, 1),
(179, 'Disability Insurance', 'Disability Insurance', 'disability-insurance', 176, '', 0, 1),
(180, 'Health Insurance', 'Health Insurance', 'health-insurance', 176, '', 0, 1),
(181, 'Home Insurance', 'Home Insurance', 'home-insurance', 176, '', 0, 1),
(182, 'Life Insurance', 'Life Insurance', 'life-insurance', 176, '', 0, 1),
(183, 'Travel Insurance', 'Travel Insurance', 'travel-insurance', 176, '', 0, 1),
(184, 'Other Insurance', 'Other Insurance', 'other-insurance', 176, '', 1, 1),
(185, 'Legal', 'Legal', 'legal', 0, '', 0, 1),
(186, 'Accident Lawyer', 'Accident Lawyers', 'accident-lawyer', 185, '', 0, 1),
(187, 'Adoption Lawyer', 'Adoption Lawyers', 'adoption-lawyer', 185, '', 0, 1),
(188, 'Arbitration', 'Arbitration', 'arbitration', 185, '', 0, 1),
(189, 'Bankruptcy Lawyer', 'Bankruptcy Lawyers', 'bankruptcy-lawyer', 185, '', 0, 1),
(190, 'Lawyer', 'Lawyers', 'lawyer', 185, '', 0, 1),
(191, 'Child Custody Lawyer', 'Child Custody Lawyers', 'child-custody-lawyer', 185, '', 0, 1),
(192, 'Civil Rights Lawyer', 'Civil Rights Lawyers', 'civil-rights-lawyer', 185, '', 0, 1),
(193, 'Criminal Defense Lawyer', 'Criminal Defense Lawyers', 'criminal-defense-lawyer', 185, '', 0, 1),
(194, 'Divorce Lawyer', 'Divorce Lawyers', 'divorce-lawyer', 185, '', 0, 1),
(195, 'Family Lawyer', 'Family Lawyers', 'family-lawyer', 185, '', 0, 1),
(196, 'Immigration Lawyer', 'Immigration Lawyers', 'immigration-lawyer', 185, '', 0, 1),
(197, 'Litigation Lawyer', 'Litigation Lawyers', 'litigation-lawyer', 185, '', 0, 1),
(198, 'Malpractice Lawyer', 'Malpractice Lawyers', 'malpractice-lawyer', 185, '', 0, 1),
(199, 'Mediation', 'Mediation', 'mediation', 185, '', 0, 1),
(200, 'Notaries', 'Notaries', 'notaries', 185, '', 0, 1),
(201, 'Patent Lawyer', 'Patent Lawyers', 'patent-lawyer', 185, '', 0, 1),
(202, 'Real Estate Lawyer', 'Real Estate Lawyers', 'real-estate-lawyer', 185, '', 0, 1),
(203, 'Tax Lawyer', 'Tax Lawyers', 'tax-lawyer', 185, '', 0, 1),
(204, 'Will', 'Wills', 'will', 185, '', 0, 1),
(205, 'Other Legal', 'Other Legal', 'other-legal', 185, '', 1, 1),
(206, 'Lessons & Training', 'Lessons & Training', 'lessons-training', 0, '', 0, 1),
(207, 'Computer Training', 'Computer Training', 'computer-training', 206, '', 0, 1),
(208, 'Dance Lesson', 'Dance Lessons', 'dance-lesson', 206, '', 0, 1),
(209, 'Language Lesson', 'Language Lessons', 'language-lesson', 206, '', 0, 1),
(210, 'Golf Lesson', 'Golf Lessons', 'golf-lesson', 206, '', 0, 1),
(211, 'Guitar Lesson', 'Guitar Lessons', 'guitar-lesson', 206, '', 0, 1),
(212, 'Martial Arts', 'Martial Arts', 'martial-arts', 206, '', 0, 1),
(213, 'Music Lesson', 'Music Lessons', 'music-lesson', 206, '', 0, 1),
(214, 'Swimming Lesson', 'Swimming Lessons', 'swimming-lesson', 206, '', 0, 1),
(215, 'Tai Chi', 'Tai Chi', 'tai-chi', 206, '', 0, 1),
(216, 'Tutoring', 'Tutoring', 'tutoring', 206, '', 0, 1),
(217, 'Other Legal', 'Other Legal', 'other-legal', 206, '', 1, 1),
(218, 'Market', 'Markets', 'market', 0, '', 0, 1),
(219, 'Bakery', 'Bakeries', 'bakery', 218, '', 0, 1),
(220, 'Butcher', 'Butchers', 'butcher', 218, '', 0, 1),
(221, 'Convenience Store', 'Convenience Stores', 'convenience-store', 218, '', 0, 1),
(222, 'Deli', 'Delis', 'deli', 218, '', 0, 1),
(223, 'Fish Market', 'Fish Market', 'fish-market', 218, '', 0, 1),
(224, 'Grocery Store', 'Grocery Stores', 'grocery-store', 218, '', 0, 1),
(225, 'Liquor Store', 'Liquor Stores', 'liquor-store', 218, '', 0, 1),
(226, 'Other Market', 'Other Market', 'other-market', 218, '', 1, 1),
(227, 'Medical', 'Medical', 'medical', 0, '', 0, 1),
(228, 'Chiropractic Clinic', 'Chiropractic Clinics', 'chiropractic-clinic', 227, '', 0, 1),
(229, 'Contact Lens', 'Contact Lenses', 'contact-lens', 227, '', 0, 1),
(230, 'Dental Clinic', 'Dental Clinics', 'dental-clinic', 227, '', 0, 1),
(231, 'Hearing Aid', 'Hearing Aids', 'hearing-aid', 227, '', 0, 1),
(232, 'Hospital', 'Hospitals', 'hospital', 227, '', 0, 1),
(233, 'Medical Clinic', 'Medical Clinics', 'medical-clinic', 227, '', 0, 1),
(234, 'Prosthetic', 'Prosthetics', 'prosthetic', 227, '', 0, 1),
(235, 'Wheelchair', 'Wheelchairs', 'wheelchair', 227, '', 0, 1),
(236, 'Medical Service', 'Medical Service', 'medical-service', 227, '', 0, 1),
(237, 'Acupuncture', 'Acupuncture', 'acupuncture', 227, '', 0, 1),
(238, 'Anesthesiology', 'Anesthesiology', 'anesthesiology', 227, '', 0, 1),
(239, 'Cardiology', 'Cardiology', 'cardiology', 227, '', 0, 1),
(240, 'Chiropractor', 'Chiropractors', 'chiropractor', 227, '', 0, 1),
(241, 'Dentist', 'Dentists', 'dentist', 227, '', 0, 1),
(242, 'Dermatologist', 'Dermatologists', 'dermatologist', 227, '', 0, 1),
(243, 'Endocrinology', 'Endocrinology', 'endocrinology', 227, '', 0, 1),
(244, 'Gastroenterology', 'Gastroenterology', 'gastroenterology', 227, '', 0, 1),
(245, 'Gynecology', 'Gynecology', 'gynecology', 227, '', 0, 1),
(246, 'Hematology', 'Hematology', 'hematology', 227, '', 0, 1),
(247, 'Holistic Medicine', 'Holistic Medicine', 'holistic-medicine', 227, '', 0, 1),
(248, 'Homeopathy', 'Homeopathy', 'homeopathy', 227, '', 0, 1),
(249, 'Hypnotherapy', 'Hypnotherapy', 'hypnotherapy', 227, '', 0, 1),
(250, 'Immunology', 'Immunology', 'immunology', 227, '', 0, 1),
(251, 'Laser Eye Surgery', 'Laser Eye Surgery', 'laser-eye-surgery', 227, '', 0, 1),
(252, 'Massage Therapy', 'Massage Therapy', 'massage-therapy', 227, '', 0, 1),
(253, 'Naturopathy', 'Naturopathy', 'naturopathy', 227, '', 0, 1),
(254, 'Nephrology', 'Nephrology', 'nephrology', 227, '', 0, 1),
(255, 'Neurology', 'Neurology', 'neurology', 227, '', 0, 1),
(256, 'Obstetrics', 'Obstetrics', 'obstetrics', 227, '', 0, 1),
(257, 'Occupational Therapy', 'Occupational Therapy', 'occupational-therapy', 227, '', 0, 1),
(258, 'Oncology', 'Oncology', 'oncology', 227, '', 0, 1),
(259, 'Ophthalmology', 'Ophthalmology', 'ophthalmology', 227, '', 0, 1),
(260, 'Optometry', 'Optometry', 'optometry', 227, '', 0, 1),
(261, 'Orthodontics', 'Orthodontics', 'orthodontics', 227, '', 0, 1),
(262, 'Orthopedics', 'Orthopedics', 'orthopedics', 227, '', 0, 1),
(263, 'Orthotics', 'Orthotics', 'orthotics', 227, '', 0, 1),
(264, 'Osteopathy', 'Osteopathy', 'osteopathy', 227, '', 0, 1),
(265, 'Pathology', 'Pathology', 'pathology', 227, '', 0, 1),
(266, 'Pediatrics', 'Pediatrics', 'pediatrics', 227, '', 0, 1),
(267, 'Pharmacy', 'Pharmacies', 'pharmacy', 227, '', 0, 1),
(268, 'Physical Therapy', 'Physical Therapy', 'physical-therapy', 227, '', 0, 1),
(269, 'Plastic Surgery', 'Plastic Surgery', 'plastic-surgery', 227, '', 0, 1),
(270, 'Podiatry', 'Podiatry', 'podiatry', 227, '', 0, 1),
(271, 'Prosthodontics', 'Prosthodontics', 'prosthodontics', 227, '', 0, 1),
(272, 'Psychiatry', 'Psychiatry', 'psychiatry', 227, '', 0, 1),
(273, 'Psychology', 'Psychology', 'psychology', 227, '', 0, 1),
(274, 'Radiology', 'Radiology', 'radiology', 227, '', 0, 1),
(275, 'Rheumatology', 'Rheumatology', 'rheumatology', 227, '', 0, 1),
(276, 'Speech Pathology', 'Speech Pathology', 'speech-pathology', 227, '', 0, 1),
(277, 'Sports Medicine', 'Sports Medicine', 'sports-medicine', 227, '', 0, 1),
(278, 'Urology', 'Urology', 'urology', 227, '', 0, 1),
(279, 'Other Medical', 'Other Medical', 'other-medical', 227, '', 1, 1),
(280, 'Movers & Storage', 'Movers & Storage', 'movers-storage', 0, '', 0, 1),
(281, 'Records Storage', 'Records Storage', 'records-storage', 280, '', 0, 1),
(282, 'Full Service Storage', 'Full Service Storage', 'full-service-storage', 280, '', 0, 1),
(283, 'Household Storage', 'Household Storage', 'household-storage', 280, '', 0, 1),
(284, 'Mover', 'Movers', 'mover', 280, '', 0, 1),
(285, 'Moving Boxes', 'Moving Boxes', 'moving-boxes', 280, '', 0, 1),
(286, 'Packing', 'Packing', 'packing', 280, '', 0, 1),
(287, 'Packing Material', 'Packing Materials', 'packing-material', 280, '', 0, 1),
(288, 'Packing Supply', 'Packing Supplies', 'packing-supply', 280, '', 0, 1),
(289, 'Piano Mover', 'Piano Movers', 'piano-mover', 280, '', 0, 1),
(290, 'Other Movers & Storage', 'Other Movers & Storage', 'other-movers-storage', 280, '', 1, 1),
(291, 'Office Product & Supply', 'Office Products & Supplies', 'office-product-supply', 0, '', 0, 1),
(292, 'Office Equipment', 'Office Equipment', 'office-equipment', 291, '', 0, 1),
(293, 'Office Equipment Rental', 'Office Equipment Rental', 'office-equipment-rental', 291, '', 0, 1),
(294, 'Office Furniture', 'Office Furniture', 'office-furniture', 291, '', 0, 1),
(295, 'Office Furniture Rental', 'Office Furniture Rental', 'office-furniture-rental', 291, '', 0, 1),
(296, 'Office Supplies', 'Office Supplies', 'office-supplies', 291, '', 0, 1),
(297, 'Used Office Equipment', 'Used Office Equipment', 'used-office-equipment', 291, '', 0, 1),
(298, 'Used Office Furniture', 'Used Office Furniture', 'used-office-furniture', 291, '', 0, 1),
(299, 'Other Office Product & Supply', 'Other Office Product & Supply', 'other-office-product-supply', 291, '', 1, 1),
(300, 'Pet & Animal', 'Pets & Animals', 'pet-animal', 0, '', 0, 1),
(301, 'Animal Hospital', 'Animal Hospitals', 'animal-hospital', 300, '', 0, 1),
(302, 'Animal Removal', 'Animal Removal', 'animal-removal', 300, '', 0, 1),
(303, 'Animal Shelter', 'Animal Shelters', 'animal-shelter', 300, '', 0, 1),
(304, 'Kennel', 'Kennels', 'kennel', 300, '', 0, 1),
(305, 'Pet Boarding', 'Pet Boarding', 'pet-boarding', 300, '', 0, 1),
(306, 'Pet Cemetery', 'Pet Cemeteries', 'pet-cemetery', 300, '', 0, 1),
(307, 'Pet Crematorium', 'Pet Crematoriums', 'pet-crematorium', 300, '', 0, 1),
(308, 'Pet Daycare', 'Pet Daycare', 'pet-daycare', 300, '', 0, 1),
(309, 'Pet Grooming', 'Pet Grooming', 'pet-grooming', 300, '', 0, 1),
(310, 'Pet Sitting', 'Pet Sitting', 'pet-sitting', 300, '', 0, 1),
(311, 'Pet Supply', 'Pet Supplies', 'pet-supply', 300, '', 0, 1),
(312, 'Pet Toy', 'Pet Toys', 'pet-toy', 300, '', 0, 1),
(313, 'Pet Training', 'Pet Training', 'pet-training', 300, '', 0, 1),
(314, 'Pet Walking', 'Pet Walking', 'pet-walking', 300, '', 0, 1),
(315, 'Veterinarian', 'Veterinarians', 'veterinarian', 300, '', 0, 1),
(316, 'Other Pet & Animal', 'Other Pet & Animal', 'other-pet-animal', 300, '', 1, 1),
(317, 'Professional Service', 'Professional Services', 'professional-service', 0, '', 0, 1),
(318, 'Architect', 'Architects', 'architect', 317, '', 0, 1),
(319, 'Career Counseling', 'Career Counseling', 'career-counseling', 317, '', 0, 1),
(320, 'Civil Engineer', 'Civil Engineers', 'civil-engineer', 317, '', 0, 1),
(321, 'Collection Agency', 'Collection Agencies', 'collection-agency', 317, '', 0, 1),
(322, 'Dry Cleaning', 'Dry Cleaning', 'dry-cleaning', 317, '', 0, 1),
(323, 'Electrician', 'Electricians', 'electrician', 317, '', 0, 1),
(324, 'Employment Agency', 'Employment Agencies', 'employment-agency', 317, '', 0, 1),
(325, 'Engineer', 'Engineer', 'engineer', 317, '', 0, 1),
(326, 'Engraver', 'Engravers', 'engraver', 317, '', 0, 1),
(327, 'Executive Search Firm', 'Executive Search Firms', 'executive-search-firm', 317, '', 0, 1),
(328, 'Heating Engineer', 'Heating Engineers', 'heating-engineer', 317, '', 0, 1),
(329, 'Job Training', 'Job Training', 'job-training', 317, '', 0, 1),
(330, 'Laundry', 'Laundry', 'laundry', 317, '', 0, 1),
(331, 'Locksmith', 'Locksmiths', 'locksmith', 317, '', 0, 1),
(332, 'Messenger Service', 'Messenger Service', 'messenger-service', 317, '', 0, 1),
(333, 'Musician', 'Musicians', 'musician', 317, '', 0, 1),
(334, 'Photocopying', 'Photocopying', 'photocopying', 317, '', 0, 1),
(335, 'Photographer', 'Photographers', 'photographer', 317, '', 0, 1),
(336, 'Piano Tuning', 'Piano Tuning', 'piano-tuning', 317, '', 0, 1),
(337, 'Printer', 'Printers', 'printer', 317, '', 0, 1),
(338, 'Private Investigator', 'Private Investigators', 'private-investigator', 317, '', 0, 1),
(339, 'Recording Studio', 'Recording Studios', 'recording-studio', 317, '', 0, 1),
(340, 'Tailor', 'Tailors', 'tailor', 317, '', 0, 1),
(341, 'Temp Agency', 'Temp Agencies', 'temp-agency', 317, '', 0, 1),
(342, 'Video Editing', 'Video Editing', 'video-editing', 317, '', 0, 1),
(343, 'Waste Management', 'Waste Management', 'waste-management', 317, '', 0, 1),
(344, 'Other Professional Service', 'Other Professional Service', 'other-professional-service', 317, '', 1, 1),
(345, 'Real Estate', 'Real Estate', 'real-estate', 0, '', 0, 1),
(346, 'Home Appraisal', 'Home Appraisals', 'home-appraisal', 345, '', 0, 1),
(347, 'Home Inspection', 'Home Inspection', 'home-inspection', 345, '', 0, 1),
(348, 'Real Estate Agent', 'Real Estate Agents', 'real-estate-agent', 345, '', 0, 1),
(349, 'Real Estate Broker', 'Real Estate Brokers', 'real-estate-broker', 345, '', 0, 1),
(350, 'Real Estate Consultant', 'Real Estate Consultants', 'real-estate-consultant', 345, '', 0, 1),
(351, 'Real Estate Developer', 'Real Estate Developers', 'real-estate-developer', 345, '', 0, 1),
(352, 'Real Estate Investment', 'Real Estate Investments', 'real-estate-investment', 345, '', 0, 1),
(353, 'Real Estate Management', 'Real Estate Management', 'real-estate-management', 345, '', 0, 1),
(354, 'Surveyor', 'Surveyors', 'surveyor', 345, '', 0, 1),
(355, 'Other Real Estate', 'Other Real Estate', 'other-real-estate', 345, '', 1, 1),
(356, 'Recreation & Sport', 'Recreation & Sports', 'recreation-sport', 0, '', 0, 1),
(357, 'Archery', 'Archery', 'archery', 356, '', 0, 1),
(358, 'Art Supply', 'Art Supplies', 'art-supply', 356, '', 0, 1),
(359, 'Billiard', 'Billiards', 'billiard', 356, '', 0, 1),
(360, 'Boating', 'Boating', 'boating', 356, '', 0, 1),
(361, 'Bowling', 'Bowling', 'bowling', 356, '', 0, 1),
(362, 'Camping', 'Camping', 'camping', 356, '', 0, 1),
(363, 'Charter Bus', 'Charter Buses', 'charter-bus', 356, '', 0, 1),
(364, 'Craft', 'Crafts', 'craft', 356, '', 0, 1),
(365, 'Cycling', 'Cycling', 'cycling', 356, '', 0, 1),
(366, 'Diving Equipment', 'Diving Equipment', 'diving-equipment', 356, '', 0, 1),
(367, 'Embroidery', 'Embroidery', 'embroidery', 356, '', 0, 1),
(368, 'Fishing', 'Fishing', 'fishing', 356, '', 0, 1),
(369, 'Flying Lesson', 'Flying Lessons', 'flying-lesson', 356, '', 0, 1),
(370, 'Golf Course', 'Golf Courses', 'golf-course', 356, '', 0, 1),
(371, 'Golf Driving Range', 'Golf Driving Ranges', 'golf-driving-range', 356, '', 0, 1),
(372, 'Golf Instruction', 'Golf Instruction', 'golf-instruction', 356, '', 0, 1),
(373, 'Gunsmith', 'Gunsmiths', 'gunsmith', 356, '', 0, 1),
(374, 'Horse Riding', 'Horse Riding', 'horse-riding', 356, '', 0, 1),
(375, 'Horse Stable', 'Horse Stables', 'horse-stable', 356, '', 0, 1),
(376, 'Hunting', 'Hunting', 'hunting', 356, '', 0, 1),
(377, 'Miniature Golf', 'Miniature Golf', 'miniature-golf', 356, '', 0, 1),
(378, 'Paintball', 'Paintball', 'paintball', 356, '', 0, 1),
(379, 'Photographic Equipment', 'Photographic Equipment', 'photographic-equipment', 356, '', 0, 1),
(380, 'Race Track', 'Race Tracks', 'race-track', 356, '', 0, 1),
(381, 'Skating', 'Skating', 'skating', 356, '', 0, 1),
(382, 'Skating Rink', 'Skating Rinks', 'skating-rink', 356, '', 0, 1),
(383, 'Ski School', 'Ski Schools', 'ski-school', 356, '', 0, 1),
(384, 'Snowboard', 'Snowboards', 'snowboard', 356, '', 0, 1),
(385, 'Snowmobile', 'Snowmobiles', 'snowmobile', 356, '', 0, 1),
(386, 'Sporting Good', 'Sporting Goods', 'sporting-good', 356, '', 0, 1),
(387, 'Tennis Club', 'Tennis Clubs', 'tennis-club', 356, '', 0, 1),
(388, 'Tennis Lesson', 'Tennis Lessons', 'tennis-lesson', 356, '', 0, 1),
(389, 'Other Recreation & Sport', 'Other Recreation & Sport', 'other-recreation-sport', 356, '', 1, 1),
(390, 'School', 'Schools', 'school', 0, '', 0, 1),
(391, 'Acting School', 'Acting Schools', 'acting-school', 390, '', 0, 1),
(392, 'Acupuncture School', 'Acupuncture Schools', 'acupuncture-school', 390, '', 0, 1),
(393, 'Adult Education', 'Adult Education', 'adult-education', 390, '', 0, 1),
(394, 'Art School', 'Art Schools', 'art-school', 390, '', 0, 1),
(395, 'Beauty School', 'Beauty Schools', 'beauty-school', 390, '', 0, 1),
(396, 'College', 'Colleges', 'college', 390, '', 0, 1),
(397, 'Community College', 'Community Colleges', 'community-college', 390, '', 0, 1),
(398, 'Computer School', 'Computer Schools', 'computer-school', 390, '', 0, 1),
(399, 'Continuing Education', 'Continuing Education', 'continuing-education', 390, '', 0, 1),
(400, 'Culinary School', 'Culinary Schools', 'culinary-school', 390, '', 0, 1),
(401, 'Dental School', 'Dental Schools', 'dental-school', 390, '', 0, 1),
(402, 'Drama School', 'Drama Schools', 'drama-school', 390, '', 0, 1),
(403, 'Driving School', 'Driving Schools', 'driving-school', 390, '', 0, 1),
(404, 'Elementary School', 'Elementary Schools', 'elementary-school', 390, '', 0, 1),
(405, 'Engineering School', 'Engineering Schools', 'engineering-school', 390, '', 0, 1),
(406, 'Fashion School', 'Fashion Schools', 'fashion-school', 390, '', 0, 1),
(407, 'Film School', 'Film Schools', 'film-school', 390, '', 0, 1),
(408, 'High School', 'High Schools', 'high-school', 390, '', 0, 1),
(409, 'Language School', 'Language Schools', 'language-school', 390, '', 0, 1),
(410, 'Law School', 'Law Schools', 'law-school', 390, '', 0, 1),
(411, 'Massage School', 'Massage Schools', 'massage-school', 390, '', 0, 1),
(412, 'Paralegal School', 'Paralegal Schools', 'paralegal-school', 390, '', 0, 1),
(413, 'Private School', 'Private Schools', 'private-school', 390, '', 0, 1),
(414, 'Real Estate School', 'Real Estate Schools', 'real-estate-school', 390, '', 0, 1),
(415, 'Secondary School', 'Secondary Schools', 'secondary-school', 390, '', 0, 1),
(416, 'Technology School', 'Technology Schools', 'technology-school', 390, '', 0, 1),
(417, 'Traffic School', 'Traffic Schools', 'traffic-school', 390, '', 0, 1),
(418, 'Veterinary School', 'Veterinary Schools', 'veterinary-school', 390, '', 0, 1),
(419, 'Other School', 'Other School', 'other-school', 390, '', 1, 1),
(420, 'Shopping', 'Shopping', 'shopping', 0, '', 0, 1),
(421, 'Baby Store', 'Baby Stores', 'baby-store', 420, '', 0, 1),
(422, 'Bed Store', 'Bed Stores', 'bed-store', 420, '', 0, 1),
(423, 'Bookstore', 'Bookstores', 'bookstore', 420, '', 0, 1),
(424, 'Candy Store', 'Candy Stores', 'candy-store', 420, '', 0, 1),
(425, 'Children''s Clothing', 'Children''s Clothing', 'childrens-clothing', 420, '', 0, 1),
(426, 'Department Store', 'Department Stores', 'department-store', 420, '', 0, 1),
(427, 'Discount Store', 'Discount Stores', 'discount-store', 420, '', 0, 1),
(428, 'Drug Store', 'Drug Stores', 'drug-store', 420, '', 0, 1),
(429, 'Fabric Store', 'Fabric Stores', 'fabric-store', 420, '', 0, 1),
(430, 'Factory Outlet', 'Factory Outlets', 'factory-outlet', 420, '', 0, 1),
(431, 'Florist', 'Florists', 'florist', 420, '', 0, 1),
(432, 'Game', 'Games', 'game', 420, '', 0, 1),
(433, 'Gift', 'Gifts', 'gift', 420, '', 0, 1),
(434, 'Handbag', 'Handbags', 'handbag', 420, '', 0, 1),
(435, 'Jewelry', 'Jewelry', 'jewelry', 420, '', 0, 1),
(436, 'Leather Good', 'Leather Goods', 'leather-good', 420, '', 0, 1),
(437, 'Lingerie', 'Lingerie', 'lingerie', 420, '', 0, 1),
(438, 'Maternity Store', 'Maternity Stores', 'maternity-store', 420, '', 0, 1),
(439, 'Mattress Store', 'Mattress Stores', 'mattress-store', 420, '', 0, 1),
(440, 'Men''s Clothing', 'Men''s Clothing', 'mens-clothing', 420, '', 0, 1),
(441, 'Musical Instrument', 'Musical Instruments', 'musical-instrument', 420, '', 0, 1),
(442, 'Outlet Store', 'Outlet Stores', 'outlet-store', 420, '', 0, 1),
(443, 'Pawn', 'Pawns', 'pawn', 420, '', 0, 1),
(444, 'Shoe Store', 'Shoe Stores', 'shoe-store', 420, '', 0, 1),
(445, 'Stationery', 'Stationery', 'stationery', 420, '', 0, 1),
(446, 'Thrift Store', 'Thrift Stores', 'thrift-store', 420, '', 0, 1),
(447, 'Toy', 'Toys', 'toy', 420, '', 0, 1),
(448, 'Uniform', 'Uniforms', 'uniform', 420, '', 0, 1),
(449, 'Watche', 'Watches', 'watche', 420, '', 0, 1),
(450, 'Women''s Clothing', 'Women''s Clothing', 'womens-clothing', 420, '', 0, 1),
(451, 'Other Shopping', 'Other Shopping', 'other-shopping', 420, '', 1, 1),
(452, 'Travel', 'Travel', 'travel', 0, '', 0, 1),
(453, 'Aircraft Charter', 'Aircraft Charters', 'aircraft-charter', 452, '', 0, 1),
(454, 'Airport Parking', 'Airport Parking', 'airport-parking', 452, '', 0, 1),
(455, 'Airport Shuttle', 'Airport Shuttles', 'airport-shuttle', 452, '', 0, 1),
(456, 'Airport Transportation', 'Airport Transportation', 'airport-transportation', 452, '', 0, 1),
(457, 'Boat Charter', 'Boat Charters', 'boat-charter', 452, '', 0, 1),
(458, 'Bus Charter', 'Bus Charters', 'bus-charter', 452, '', 0, 1),
(459, 'Bus Line', 'Bus Lines', 'bus-line', 452, '', 0, 1),
(460, 'Car Rental', 'Car Rental', 'car-rental', 452, '', 0, 1),
(461, 'Helicopter Charter', 'Helicopter Charters', 'helicopter-charter', 452, '', 0, 1),
(462, 'Limo', 'Limos', 'limo', 452, '', 0, 1),
(463, 'Taxicab', 'Taxicabs', 'taxicab', 452, '', 0, 1),
(464, 'Yacht Charter', 'Yacht Charters', 'yacht-charter', 452, '', 0, 1),
(465, 'Travel', 'Travel', 'travel', 452, '', 0, 1),
(466, 'Airline', 'Airlines', 'airline', 452, '', 0, 1),
(467, 'Airport', 'Airports', 'airport', 452, '', 0, 1),
(468, 'Bed & Breakfast', 'Bed & Breakfast', 'bed-breakfast', 452, '', 0, 1),
(469, 'Cruise', 'Cruises', 'cruise', 452, '', 0, 1),
(470, 'Hotel', 'Hotels', 'hotel', 452, '', 0, 1),
(471, 'Luggage', 'Luggage', 'luggage', 452, '', 0, 1),
(472, 'Motel', 'Motels', 'motel', 452, '', 0, 1),
(473, 'Passport Photographer', 'Passport Photographers', 'passport-photographer', 452, '', 0, 1),
(474, 'Travel Agent', 'Travel Agents', 'travel-agent', 452, '', 0, 1),
(475, 'Other Travel', 'Other Travel', 'other-travel', 452, '', 1, 1),
(476, 'Wedding & Party', 'Weddings & Parties', 'wedding-party', 0, '', 0, 1),
(477, 'Banquet Room', 'Banquet Rooms', 'banquet-room', 476, '', 0, 1),
(478, 'Bartending', 'Bartending', 'bartending', 476, '', 0, 1),
(479, 'Bridal Bouquet', 'Bridal Bouquets', 'bridal-bouquet', 476, '', 0, 1),
(480, 'Bridal Gown', 'Bridal Gowns', 'bridal-gown', 476, '', 0, 1),
(481, 'Bridal', 'Bridals', 'bridal', 476, '', 0, 1),
(482, 'Catering', 'Catering', 'catering', 476, '', 0, 1),
(483, 'Clown', 'Clowns', 'clown', 476, '', 0, 1),
(484, 'Entertainer', 'Entertainers', 'entertainer', 476, '', 0, 1),
(485, 'Invitation', 'Invitations', 'invitation', 476, '', 0, 1),
(486, 'Magician', 'Magicians', 'magician', 476, '', 0, 1),
(487, 'Party Planning', 'Party Planning', 'party-planning', 476, '', 0, 1),
(488, 'Party Store', 'Party Stores', 'party-store', 476, '', 0, 1),
(489, 'Reception Planning', 'Reception Planning', 'reception-planning', 476, '', 0, 1),
(490, 'Tuxedo', 'Tuxedos', 'tuxedo', 476, '', 0, 1),
(491, 'Wedding Announcement', 'Wedding Announcements', 'wedding-announcement', 476, '', 0, 1),
(492, 'Wedding Cake', 'Wedding Cakes', 'wedding-cake', 476, '', 0, 1),
(493, 'Wedding Catering', 'Wedding Catering', 'wedding-catering', 476, '', 0, 1),
(494, 'Wedding Chapel', 'Wedding Chapels', 'wedding-chapel', 476, '', 0, 1),
(495, 'Wedding Dress', 'Wedding Dresses', 'wedding-dress', 476, '', 0, 1),
(496, 'Wedding Musician', 'Wedding Musicians', 'wedding-musician', 476, '', 0, 1),
(497, 'Wedding Photographer', 'Wedding Photographers', 'wedding-photographer', 476, '', 0, 1),
(498, 'Wedding Planning', 'Wedding Planning', 'wedding-planning', 476, '', 0, 1),
(499, 'Wedding Service', 'Wedding Services', 'wedding-service', 476, '', 0, 1),
(500, 'Wedding Supplie', 'Wedding Supplies', 'wedding-supplie', 476, '', 0, 1),
(501, 'Wedding Video', 'Wedding Video', 'wedding-video', 476, '', 0, 1),
(502, 'Other Wedding & Party', 'Other Wedding & Party', 'other-wedding-party', 476, '', 1, 1);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
