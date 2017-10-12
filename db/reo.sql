-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2016 at 10:38 PM
-- Server version: 5.6.32-78.1
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `transitc_reo`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_num` int(11) NOT NULL,
  `user_comment` varchar(500) NOT NULL,
  `appointment_date` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `agent_comment` varchar(500) NOT NULL,
  `reference_id` varchar(30) NOT NULL,
  `mls_id` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `first_name`, `last_name`, `email`, `phone_num`, `user_comment`, `appointment_date`, `status`, `agent_comment`, `reference_id`, `mls_id`) VALUES
(7, 'Peter', 'Huang', 'peterhonline@gmail.com', 0, 'Testing1', '12:59:30pm 2016-12-04', 'inactive', '', '69821', 'E3658226'),
(8, 'Peter', 'Huang', 'peterhonline@gmail.com', 0, 'Seriously, I am running out of things to say', '12:59:38pm 2016-12-04', 'active', '', '13705', 'E3655297'),
(9, 'Peter', 'Huang', 'peterhonline@gmail.com', 0, 'I am running out of things to say.', '01:59:44am 2016-12-05', 'inactive', '', '84938', 'N3649631'),
(10, 'Peter', 'Huang', 'peterhonline@gmail.com', 0, 'I would like to know how the neighbourhood is like.', '08:25:24am 2016-12-05', 'active', '', '62736', 'C3651227'),
(11, 'Peter', 'Huang', 'peterhonline@gmail.com', 0, 'May I know if pets are allowed?', '08:26:51am 2016-12-05', 'active', '', '6714', 'N3649631'),
(12, 'Peter', 'Huang', 'peterhonline@gmail.com', 0, 'I am running out of things to say.', '08:29:40am 2016-12-05', 'active', '', '48134', 'N3662235'),
(13, 'Peter', 'Huang', 'peterhonline@gmail.com', 0, 'Is it alright if I bring a friend as well?', '12:30:55pm 2016-12-05', 'active', '', '5869', 'N3649631'),
(14, 'Peter', 'Huang', 'peterhonline@gmail.com', 0, '#1 Favourite Listing', '02:45:42pm 2016-12-05', 'active', '', '97516', 'E3655297'),
(15, 'Peter', 'Huang', 'peterhonline@gmail.com', 0, 'Good luck with your exams!', '03:18:33pm 2016-12-05', 'active', '', '80013', 'N3661873'),
(16, 'kalvin', 'kao', 'kaokalvin@gmail.com', 0, 'appointment', '06:19:20pm 2016-12-05', 'inactive', '', '33746', ''),
(17, 'Kalvin', 'Kao', 'kaokalvin@gmail.com', 0, 'Appointment', '06:20:08pm 2016-12-05', 'active', '', '51788', 'C3659403'),
(18, 'Philip', 'Ojo', 'philip13@my.yorku.ca', 0, 'Does this place allow pets?', '08:16:37pm 2016-12-05', 'inactive', '', '63478', 'N3662235');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_house_listing`
--

CREATE TABLE IF NOT EXISTS `favourite_house_listing` (
  `id` int(12) NOT NULL,
  `mls_id` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite_house_listing`
--

INSERT INTO `favourite_house_listing` (`id`, `mls_id`, `email`, `status`) VALUES
(1, 'N3649631', 'peterhonline@gmail.com', 'active'),
(2, 'C3651227', 'peterhonline@gmail.com', 'active'),
(3, 'N3649631', 'peterhonline@gmail.com', 'active'),
(4, 'N3662235', 'peterhonline@gmail.com', 'active'),
(5, 'N3649631', 'peterhonline@gmail.com', 'active'),
(6, 'E3655297', 'peterhonline@gmail.com', 'active'),
(7, 'N3661873', 'peterhonline@gmail.com', 'active'),
(8, '', 'kaokalvin@gmail.com', 'active'),
(9, 'C3659403', 'kaokalvin@gmail.com', 'inactive'),
(10, 'N3662235', 'philip13@my.yorku.ca', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `id` int(9) NOT NULL,
  `street_num` int(5) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `unit_num` varchar(4) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `num_of_bedroom` int(2) NOT NULL,
  `num_of_bathroom` int(2) NOT NULL,
  `region` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province_territory` varchar(50) NOT NULL,
  `price` int(9) NOT NULL,
  `mls_id` varchar(10) NOT NULL,
  `latitude` decimal(11,6) NOT NULL,
  `longitude` decimal(11,6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `street_num`, `street_name`, `unit_num`, `postal_code`, `description`, `num_of_bedroom`, `num_of_bathroom`, `region`, `city`, `province_territory`, `price`, `mls_id`, `latitude`, `longitude`) VALUES
(1, 629, 'King Street West', '1223', 'M5V0G9', 'King West At Its Best. Elegant Living With Lavish Amenities And First-Class Services. Live And Play In One Of Toronto''s Hippest And Hottest Spots. This One Of A Kind Junior 1 Bedroom Suite Comes Fully Upgraded. This Unit Features A Balcony (Breathtaking Views Of Our Stunning City) Locker, Built-In Appliances, Open Floor Plan And Of Course The Hottest Roof Top Patio In The City. Close To So Many Phenomenal Shops, Restaurants And Transit. Will Not Last.', 1, 1, 'Greater Toronto Area', 'Toronto', 'Ontario', 359000, 'C3659403', '43.643964', '-79.401476'),
(2, 116, 'Main Unionville St ', '', 'L3R 2V5', 'Circa 1915, Heritage Home. Grand House On Main Street, Unionville. 9'' Main Floor Ceilings, 8''6" Second Floor Ceilings. Finished Third Floor With Dens That Can Be Converted Into Bedrooms. Loads Of Character, Original Wood Trim. Pocket Doors. Large Enclosed Front Porch. Steps To The School, Go Train Station, Ymca. Near Library, Cinema, Markville Mall, Supermarket And All Amenities. Previously Used As A Lawyer''s Office.', 4, 3, 'Markham', 'Markham', 'ON', 1790000, 'N3649631', '43.862881', '-79.310212'),
(3, 34, 'Raleign Cres', '', 'L3R 4W5', 'Fabulous House In Unionville With Many Updates & Upgrades. Updated Kitchen, Bathrooms, Windows, Shingles, Furnace & Air, Flooring, And Garage Door. Fireplace In Family Room. Basement Redone In 2012. Backs To Park. Kitchen Pantry. Direct Interior Door To Garage. Very Private Treed Backyard. Great Location. Walk To Markville Mall, Transit, Parks, Go Train And Community Centre. Move Right In!', 3, 2, 'Markham', 'Markham', 'ON', 788000, 'N3661873', '43.868181', '-79.296016'),
(4, 164, 'Sunway Sq', '', 'L3P 7X6', 'Location!Location!Location!Freehold Townhouse In High Demand Area,Owner Well Cared For,Model Home,High Range School James Robinson P.S(348/3037)Markville S.S(25/676)New Windows And Blind(2015),California Shutters(2015),New Roof(2014),New Model Kitchen And New Ceramic(2014),High Effic Furnace &Ac&Water Heater,Huge Deck,Professionally Finished Basement,Steps To Go Station,Schools,Community Centre, Loblaws, Markville Mall,Transit & Hwy 407.', 3, 4, 'Markham', 'Markham', 'ON', 788000, 'N3662235', '43.876160', '-79.286242'),
(5, 228, 'Main St N', '68', 'L3P0N5', 'Absolutely Stunning Condo In Immaculate Condition. Just Like New. 2 Bedrooms & 2 Baths Plus Den. Open Concept. Large Kitchen Island. Huge Master Bedroom & Huge Walk In Closet. Ensuite With Separate Shower & Soaker Tub. Right On Main St. Close To Restaurants, Banks, Go Train & Shopping. Flat Ceilings Throughout. Fabulous Roof Top Terrace. 2 Guest Suites. Move Right In And Enjoy!', 2, 2, 'Markham', 'Markham', 'ON', 479000, 'N3653337', '43.883645', '-79.262153'),
(6, 67, 'Peace Dr', '', 'M1G2V3', 'A Desirable Backsplit Home In High Demand Area. Backing On To Greenspace And Bike Paths This Updated Well Laid Out Family Home Is Steps To Centennial College, Scar Uoft , Walk To High And Public Schools, Parks And Public Transport (Easy Access To Scarborough Town Centre). Featuring An Updated Eat-In Kitchen And Separate Entrance To Bright Basement Apartment And Hardwood Flooring Throughout Main And Upper Floors.', 3, 2, 'Scarborough', 'Scarborough', 'ON', 629900, 'E3655297', '43.774221', '-79.226869'),
(7, 2516, 'Lee Centre Dr', '36', 'M1H3K2', 'This Lovely Unit Close To The Top Floor Of This Stunning Building In A Highly Desired Scarborough Neighborhood. Building Is Very Well Maintained And Has Exceptional Amenities. Fantastic Layout With Gorgeous Views Of The City. This One + Den Has A Functional That Can Actually Be Used As A Bedroom! You Will Love To Call This Place Home! Walking Distance To Scarborough Town Centre And The Ttc Right At Your Door. Rt Transit Line A Short Walk.', 1, 1, 'Scarborough', 'Scarborough', 'ON', 255000, 'E3661085', '43.781678', '-79.247213'),
(8, 822, 'Corportate Dr ', '68', 'M1H3H3', 'Luxury Tridel Condo, Prime Location Closing To Scarborough Town Centre, Rt, Hwy 401. Ttc Beside The Building. New Paint, New Broadloom, Bright + Clean, 2 Bedroom + 2 Bathrooms. Unobstructed West View. Fabulous Rec Facilities, 24 Hrs Security.', 2, 2, 'Scarborough', 'Scarborough', 'ON', 329000, 'E3633628', '43.780188', '-79.250012'),
(9, 160, 'Sedgemount Dr', '', 'M1H1Y2', 'Awesome Luxury Bungalow Custom Reno''s. Situated On A Beautiful 42X120 Feet Deep Lot, Backing Onto No Neighbors. Over 100K On Reno''s, Granite Counter Tops, All Branded New Lights Fixtures, Crown Molding, New Baseboards, Marble Porcelain Tiles In Bathroom. Brand New S/S Appliances, Tankless Water Rental, And Too Many Quality Upgrades To List! Offers Welcome Anytime!', 3, 4, 'Scarborough', 'Scarborough', 'ON', 765000, 'E3658226', '43.767362', '-79.232830'),
(10, 272, 'Taylor Mills Dr N', '', 'L4C2T9', 'Beautiful Updated Home With Finished Basement With Separate Entrance, Hardwood Floors, Built-In Furniture In Two Bedrooms, Fantastic Location, Close To Parks, Top Ranking Schools, Transportation, Yonge St. Shopping.', 3, 2, 'Richmond Hill', 'Richmond Hill', 'ON', 715000, 'N3644370', '43.889907', '-79.427282'),
(11, 75, 'King William Crescent', '', 'L4B0C1', 'Miracle On Yonge* South Views Bright, Spacious Apartment* Granite Countertops Kitchen And Bath* Beautiful Upgraded Cabinets @Floor* Excellent Location! Walk To Yonge Close To All Amenities, Easy Access To Hwy7/407/Yonge. Public Transit (Yrt/Viva/Go Station, Shopping. Restaurants, Parks Etc. Amenities Including Fitness Club, Lounge, Cardio/Yoga Retreat, Steam Rm, 24Hr Concierge, Guest Room, Party Rm, Plenty Of Visitors Parking* **** EXTRAS **** Stainless Steel Fridge, Stove, B/I Dishwasher, B/I Microwave, Washer And Dryer, All Window Covering, All Electric Light Fixtures* Underground Parking And Locker Included', 1, 1, 'Richmond Hill', 'Richmond Hill', 'ON', 259800, 'N3654963', '43.846435', '-79.427145'),
(12, 94, 'Colesbrook Rd', '', 'L4S2G5', 'Beautiful 4 Bedroom Home In A High Demand Neighbourhood On A Quiet Street Completely Upgraded, Include Custom Kitchen, Granite Counters & Hardwood Floor Walk-Out To Ravine Lot, Finished W/O Basement, Sauna ** Top Ranking Trillium Woods Ps & Richmond Hill Hs ** Close To Transit, Community Center, Shopping, Park,Hospital.', 4, 5, 'Richmond Hill', 'Richmond Hill', 'ON', 1499888, 'N3652031', '43.900808', '-79.462734'),
(14, 25, 'Oxley St', '712', 'M5V2J5', 'Gorgeous 1 Bdrm Loft At Glas Condos. Includes Rare Parking & Locker! South Facing Balcony W/ Bbq Gasline. 9Ft Exposed Concrete Ceilings, Floor-To-Ceiling Windows, Hrwd Floors, Modern Italian Kitchen W/Soft Close Drawers, Glass Backsplash, Caesarstone Counters, Ss Appliances & Corian Bathroom Counters. Great Location On A Quiet Street In The Fashion District, Steps To The Financial District, Restaurants, Entertainment,Ttc & More. ***Low Maintenance Fees***', 1, 1, 'DOWNTOWN TORONTO', 'Toronto', 'ON', 399000, 'C3662544', '43.646247', '-79.394518'),
(15, 260, 'Sackville St', '207', 'M5A0B3', 'One Park West Condos, Built By Award Winning Daniels Corp Is The Center Of A Re-Developed Regent Park. This Condo & Area Has All The Amenities Of A Modern Community. Walk To Ttc, Shopping, Banks, Pharmacy, Cafes, Restaurants, Health Services & Close To Dvp. Enjoy A Panoramic Un-Obstructed View Of A Beautiful 6 Acre Central Park. Aquatic Center, Basketball Court, Soccer Field, Hocley Rink, Track Are All Near By. Urban Living At Its Best!', 1, 2, 'DOWNTOWN TORONTO', 'Toronto', 'ON', 399900, 'C3651227', '43.661013', '-79.363572'),
(16, 51, 'Lady Bank Rd', '203', 'M8Z4J6', 'Absolutely Cozy Suite, Open Concept, Living/Dining /Kitchen. Gourmet Chef''s Kitchen. Lovely Hardwood Floors Throughout, Semi Ensuite Bathroom W/O To Large Terrace (246 Sq. Feet). Perfect For Entertaining, Quiet Building, 1 Parking Spot Included. Ttc At Door, One Bus To Subway, Close To Restaurants, Movie Theatre, Qew, Shopping, And All Other Amenities, Norseman School District. Move In And Enjoy!', 1, 1, 'Etobicoke', 'Toronto', 'ON', 333700, 'W3637747', '43.624566', '-79.511682'),
(17, 306, 'Melrose St', '', 'M8Z1G6', 'Renovated In Mimico! Detached 3-Bedroom Bungalow Features Pot Lights And Laminate Floors Throughout The Home. This Open Concept Living/Dining Combined Has Fireplace Decor And Stain Glass Windows. Kitchen Has New Stainless Steel Samsung Appliances, Fridge, Stove & Microwave Fan With Eat-In Marble Island. Master W/O To Deck. Lower Level Great As In-Law Or Guest Ensuite, Has Separate Entrance. Mutual Lane Shared Driveway, Garage At Rear Of Home.', 4, 2, 'Etobicoke', 'Toronto', 'ON', 699000, 'W3656476', '43.619732', '-79.502895'),
(18, 15, 'Brussels St', 'A', 'M8Y1H2', 'New Home W/ Transitional Design*Minutes To Hwy, Transit, Shops*Rapidly Developing Stonegate Locale*South Etobicoke!!Elevation Features Linear Metallic Black Brick Accented W/ Walnut Longboard*Soft Grey Stucco*8 Ft Walnut Frt Door & Modern Glass Garage*Modern Italian Lube Kitchen W/ Iarge Island & Breakfast Bar*White Quartz Counters*Show Case Illuminated Staircase W/ Glass Wall*Large Windows & Slider Entices Natural Light*Up To 10 Ft Ceilings.', 3, 4, 'Etobicoke', 'Toronto', 'ON', 1425000, 'W3650566', '43.626758', '-79.492616'),
(19, 1185, 'The Queensway', '', 'M8Z0C6', 'Exquisite Iq Towers By Reamington. Bright And Sunny 9 Foot Ceiling Unit With Granite Counter Tops, Breakfast Bar And Stainless Steel Appliances! Oversized Balcony Approx 150 Sq Feet. Custom Blinds. Over $3,500 Spent On Upgrades From Builder. Great Amenities: Indoor Pool, Sauna, Gym, Etc.!', 2, 1, 'Etobicoke', 'Toronto', 'ON', 339000, 'W3662937', '43.621763', '-79.521461'),
(20, 2900, 'Battleford Rd', '406', 'L5N2V9', 'Renovated & Freshly Painted Gorgeous 2 Bedroom Condo With South Exposure. All Day Sun In This 832 Sq Ft Suite. Steps To Meadowvale Town Centre Restaurants, Shopping, Library, Community Centre & More. Close To Public Transit, Go Station, Highways 401, 407, 410 & 403. Amazingly Priced To Sell!!! Don''t Miss Out On This Great Opportunity!!!', 2, 1, 'Mississauga', 'Mississauga', 'ON', 236900, 'W3618665', '43.579798', '-79.757383'),
(21, 156, 'Enfield Pl', '1605', 'L5B4L8', 'Luxurious & Spacious 2 Bdrm/2 Wshrm Corner Suite W/ Den & Solarium! Meticulously Maintained, Shows True Pride Of Ownership. Very Desirable Layout W/ Open Concept Living/Dining, A Beautiful Kitchen W/ Family Sized Breakfast Area, A Huge Master W/Ensuite, His & Her Walk-In Closets & A Spectacular View From Every Room. Perfectly Situated In Downtown Mississauga, Steps To Shops, Restaurants, Sq1, Easy Access To 403 & Qew, Go & Transit, & Upcoming Lrt.', 2, 2, 'Mississauga', 'Mississauga', 'ON', 448900, 'W3657912', '43.590846', '-79.633992'),
(22, 50, 'Absolute Ave', '502', 'L4Z0A8', 'A Large 1 Br Suite In Landmark Building In Downtown Mississauga Absolute World 2 The Suite Size Is 620 Sq Ft+135 Sq Ft Balcony (755 Sq Ft). Comes With A Large Layout +Balcony 9Ft Ceilings Add To The Openness Of The Suite. Lots Of Upgrades- Desginer Paint Stainless Steel Appliances, Upgraded Stove, Granite Countertop, Undermount Sink, Centre Island, Valance Lighting. Clear Views From', 1, 1, 'Mississauga', 'Mississauga', 'ON', 259000, 'W3637806', '43.595014', '-79.636014'),
(23, 530, 'Lolita Gdns', '1408', 'L5A3T2', '!!!Wow!!!Fully Renovated Thousands Of $$$ Spent On Quality Upgrades Including New Gleaming Laminate Floor Thorough Out(No Carpet),New Modern Kitchen With Pantry, Backsplash, Ceramic Floor, New Washroom, Fresh Paint Thorough Out Offers Very Good Sized Spacious 3 Bedrooms, Close To All Amenities School, Shopping, Transit, Park, Highways, Recreational Facilities, Very Clean Shows Well, Act Now Before Its Too Late Wont Stay Long In The Market, Very Spacious Rooms **** EXTRAS **** Include Fridge, Stove, Dishwasher, All Elf''s, Window Ac Unit, Window Coverings...Shows Well, Show And Sell 10++++', 3, 1, 'Mississauga', 'Mississauga', 'ON', 259800, 'W3658764', '43.592434', '-79.605565');

-- --------------------------------------------------------

--
-- Table structure for table `property_details`
--

CREATE TABLE IF NOT EXISTS `property_details` (
  `id` int(9) NOT NULL,
  `type` varchar(50) NOT NULL,
  `levels` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `lot_size` varchar(10) NOT NULL,
  `maintenance_fee` varchar(10) NOT NULL,
  `mls_id` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_details`
--

INSERT INTO `property_details` (`id`, `type`, `levels`, `size`, `lot_size`, `maintenance_fee`, `mls_id`) VALUES
(1, 'Detached', '2 1/2 Storey', '1200–1399', '-', '$774', 'W3657912'),
(3, 'Apartment', '2-Storey', 'N/A sq ft', '29.5x103.4', '-', 'N3661873'),
(4, 'Townhouse', '2-Storey', 'N/A sq ft', '6m x 35.9m', '-', 'N3662235'),
(5, 'Apartment', 'Apartment', '900–999sft', '-', '$583', 'N3653337'),
(6, 'Detached Bungalow ', 'Backsplit 3', 'N/A sq ft', '46.1x111.3', '-', 'E3655297'),
(7, 'Apartment', 'Apartment', '600–699sqf', '-', '$430', 'E3661085'),
(8, 'Apartment', 'Apartment', '800–899sqf', '-', '$576', 'E3633628'),
(9, 'Detached Bungalow ', 'Bungalow', 'N/A sq ft', '42ftx120ft', '-', 'E3658226'),
(10, 'Semi-Detached', '2-Storey', 'N/A sq ft', '42ftx75ft', '-', 'N3644370'),
(11, 'Apartment', 'Single Family', 'N/A sq ft', '-', '$429', 'N3654963'),
(12, 'Detached', '2-Storey', '2000–2500', '32.7x111.3', '', 'N3652031'),
(13, 'Apartment', 'Apartment', '500–599sft', '', '$377', 'W3637747'),
(14, 'Bungalow Detached', 'Bungalow', 'N/A sq ft', '30ftx128ft', '', 'W3656476'),
(15, 'Detached', '2-Storey', '2000–2500', '25ftx103ft', '', 'W3650566'),
(16, 'Apartment', 'Apartment', '500–599sft', '', '$301', 'C3662544'),
(17, 'Apartment', 'Apartment', '600–699sft', '', '$526', 'C3651227'),
(18, 'Apartment', 'Apartment', '600–699sft', '', '$396', 'W3662937'),
(19, 'Comm Element Condo', 'Apartment', '800–899sft', '', '$627', 'W3618665'),
(20, 'Apartment', 'Apartment', '1200–1399', '', '$774', 'W3657912'),
(21, 'Apartment', 'Apartment', '600–699sft', '', '$521', 'W3637806'),
(22, 'Apartment', 'Apartment', '', '', '$712.00', 'W3658764'),
(23, 'Apartment', 'Apartment', '499 sq ft', '', '$325', 'C3659403');

-- --------------------------------------------------------

--
-- Table structure for table `property_exterior`
--

CREATE TABLE IF NOT EXISTS `property_exterior` (
  `id` int(9) NOT NULL,
  `exterior` varchar(50) NOT NULL,
  `basement` varchar(50) NOT NULL,
  `garage` varchar(50) NOT NULL,
  `driveway` varchar(50) NOT NULL,
  `mls_id` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_exterior`
--

INSERT INTO `property_exterior` (`id`, `exterior`, `basement`, `garage`, `driveway`, `mls_id`) VALUES
(1, 'Brick', 'Finished', 'None', 'Private', 'N3649631'),
(2, 'Brick ', 'Finished', 'Attached', 'Private', 'N3661873'),
(3, 'Brick', 'Finished', 'Built-In', 'Private', 'N3662235'),
(4, 'Concrete', 'None', 'Undergrnd', '-', 'N3653337'),
(5, 'Brick', 'Apartment and Sep Entrance', 'None', 'Private', 'E3655297'),
(6, 'Concrete', 'None', 'Undergrnd', '-', 'E3661085'),
(7, 'Concrete', 'None', 'Undergrnd', '-', 'E3633628'),
(8, 'Brick', 'Full and Sep Entrance', 'None', 'Mutual', 'E3658226'),
(9, 'Brick', 'Finished and Sep Entrance', 'None', 'Private', 'N3644370'),
(10, 'Brick', '-', 'Underground', '-', 'N3654963'),
(11, 'Stone', 'Fin W/O', 'Attached', 'Pvt Double', 'N3652031'),
(12, 'Stucco/Plaster', 'None', 'Other', '', 'W3637747'),
(13, 'Brick', 'Finished and Sep Entrance', 'Detached', 'Mutual', 'W3656476'),
(14, 'Brick', 'Finished and Sep Entrance', 'Attached', 'Private', 'W3650566'),
(15, 'Concrete', 'None', 'Undergrnd', '', 'C3662544'),
(16, 'Concrete', 'None', 'None', '', 'C3651227'),
(17, 'Concrete', 'None', 'Undergrnd', '', 'W3662937'),
(18, 'Brick', 'None', 'Undergrnd', '', 'W3618665'),
(19, 'Brick', 'None', 'Undergrnd', '', 'W3657912'),
(20, 'Brick ', 'None', 'Undergrnd', '', 'W3637806'),
(21, 'Concrete', 'None', 'Undergrnd', '', 'W3658764'),
(22, 'Brick', 'None', 'Undergrnd', '', 'C3659403');

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE IF NOT EXISTS `property_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(150) NOT NULL,
  `mls_id` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `image_path`, `mls_id`) VALUES
(1, '/img/property_images/C3659403_001.jpg', 'C3659403'),
(2, '/img/property_images/C3659403_002.jpg', 'C3659403'),
(3, '/img/property_images/C3659403_003.jpg', 'C3659403'),
(4, '/img/property_images/N3649631_001.jpg', 'N3649631'),
(5, '/img/property_images/N3649631_005.jpg', 'N3649631'),
(6, '/img/property_images/N3649631_014.jpg', 'N3649631'),
(7, '/img/property_images/N3661873_001.jpg', 'N3661873'),
(8, '/img/property_images/N3661873_002.jpg', 'N3661873'),
(9, '/img/property_images/N3661873_003.jpg', 'N3661873'),
(10, '/img/property_images/N3662235_001.jpg', 'N3662235'),
(11, '/img/property_images/N3662235_002.jpg', 'N3662235'),
(12, '/img/property_images/N3662235_003.jpg', 'N3662235'),
(13, '/img/property_images/N3653337_001.jpg', 'N3653337'),
(14, '/img/property_images/N3653337_002.jpg', 'N3653337'),
(15, '/img/property_images/N3653337_003.jpg', 'N3653337'),
(16, '/img/property_images/E3655297_001.jpg', 'E3655297'),
(17, '/img/property_images/E3655297_002.jpg', 'E3655297'),
(18, '/img/property_images/E3655297_003.jpg', 'E3655297'),
(19, '/img/property_images/E3661085_001.jpg', 'E3661085'),
(20, '/img/property_images/E3661085_002.jpg', 'E3661085'),
(21, '/img/property_images/E3661085_003.jpg', 'E3661085'),
(22, '/img/property_images/E3633628_001.jpg', 'E3633628'),
(23, '/img/property_images/E3633628_002.jpg', 'E3633628'),
(24, '/img/property_images/E3633628_003.jpg', 'E3633628'),
(25, '/img/property_images/E3658226_001.jpg', 'E3658226'),
(26, '/img/property_images/E3658226_002.jpg', 'E3658226'),
(27, '/img/property_images/E3658226_003.jpg', 'E3658226'),
(28, '/img/property_images/N3644370_001.jpg', 'N3644370'),
(29, '/img/property_images/N3644370_002.jpg', 'N3644370'),
(30, '/img/property_images/N3644370_003.jpg', 'N3644370'),
(31, '/img/property_images/N3654963_001.jpg', 'N3654963'),
(32, '/img/property_images/N3654963_002.jpg', 'N3654963'),
(33, '/img/property_images/N3654963_003.jpg', 'N3654963'),
(34, '/img/property_images/N3652031_001.jpg', 'N3652031'),
(35, '/img/property_images/N3652031_002.jpg', 'N3652031'),
(36, '/img/property_images/N3652031_003.jpg', 'N3652031'),
(37, '/img/property_images/km000696_slide_01.jpg', ''),
(38, '/img/property_images/km000696_slide_02.jpg', ''),
(39, '/img/property_images/km000696_slide_06.jpg', ''),
(43, '/img/property_images/C3662544_001.jpg', 'C3662544'),
(44, '/img/property_images/C3662544_002.jpg', 'C3662544'),
(45, '/img/property_images/C3662544_003.jpg', 'C3662544'),
(46, '/img/property_images/C3651227_001.jpg', 'C3651227'),
(47, '/img/property_images/C3651227_002.jpg', 'C3651227'),
(48, '/img/property_images/C3651227_003.jpg', 'C3651227'),
(49, '/img/property_images/W3637747_001.jpg', 'W3637747'),
(50, '/img/property_images/W3637747_002.jpg', 'W3637747'),
(51, '/img/property_images/W3637747_003.jpg', 'W3637747'),
(52, '/img/property_images/W3656476_001.jpg', 'W3656476'),
(53, '/img/property_images/W3656476_002.jpg', 'W3656476'),
(54, '/img/property_images/W3656476_003.jpg', 'W3656476'),
(55, '/img/property_images/W3650566_001.jpg', 'W3650566'),
(56, '/img/property_images/W3650566_002.jpg', 'W3650566'),
(57, '/img/property_images/W3650566_003.jpg', 'W3650566'),
(58, '/img/property_images/W3662937_001.jpg', 'W3662937'),
(59, '/img/property_images/W3662937_002.jpg', 'W3662937'),
(60, '/img/property_images/W3662937_003.jpg', 'W3662937'),
(62, '/img/property_images/W3618665_002.jpg', 'W3618665'),
(63, '/img/property_images/W3618665_003.jpg', 'W3618665'),
(64, '/img/property_images/W3618665_001.jpg', 'W3618665'),
(65, '/img/property_images/W3657912_001.jpg', 'W3657912'),
(66, '/img/property_images/W3657912_002.jpg', 'W3657912'),
(67, '/img/property_images/W3657912_003.jpg', 'W3657912'),
(68, '/img/property_images/W3637806_001.jpg', 'W3637806'),
(69, '/img/property_images/W3637806_002.jpg', 'W3637806'),
(70, '/img/property_images/W3637806_003.jpg', 'W3637806'),
(71, '/img/property_images/W3658764_001.jpg', 'W3658764'),
(72, '/img/property_images/W3658764_002.jpg', 'W3658764'),
(73, '/img/property_images/W3658764_003.jpg', 'W3658764');

-- --------------------------------------------------------

--
-- Table structure for table `property_layout`
--

CREATE TABLE IF NOT EXISTS `property_layout` (
  `id` int(9) NOT NULL,
  `living` varchar(50) NOT NULL,
  `dining` varchar(50) NOT NULL,
  `kitchen` varchar(50) NOT NULL,
  `master` varchar(50) NOT NULL,
  `other` varchar(50) NOT NULL,
  `mls_id` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_layout`
--

INSERT INTO `property_layout` (`id`, `living`, `dining`, `kitchen`, `master`, `other`, `mls_id`) VALUES
(1, 'Ground- 11.91 × 28.54 ft', 'Ground- 11.32 × 14.47 ft', 'Ground- 5.05 × 13.81 ft', '2nd- 15.98 × 10.66 ft', 'Bedrooms 2-4 located on 2nd floor', 'N3649631'),
(2, 'Ground- 9.78 × 13.78 ft', 'Ground- 8.04 × 8.79 ft', 'Ground- 8.14 × 11.32 ft', '2nd- 10.83 × 17.06 ft', '2nd/3rd bedroom on 2nd floor. 9.51 × 11.48 ft', 'N3661873'),
(3, 'Ground- 9.84 × 14.50 ft', 'Ground- 10.99 × 14.01 ft', 'Ground- 8.99 × 9.84 ft', '2nd- 19.00 × 14.01 ft', '2nd/3rd Bdroom: 2nd, 4th Bdroom Basement', 'N3662235'),
(4, 'Flat- 10.07 × 17.39 ft', 'Flat- 10.07 × 17.39 ft', 'Flat- 8.30 × 10.33 ft', 'Flat- 10.99 × 15.42 ft', '2nd bedroom Flat- 8.86 × 9.84 ft', 'N3653337'),
(5, 'Main- 12.14 × 15.42 ft', 'Main- 10.83 × 13.12 ft', 'Main- 12.14 × 14.11 ft', 'Upper- 9.84 × 13.78 ft', '2nd/3rd bdroom upper', 'E3655297'),
(6, 'Flat- 10.17 × 18.08 ft', 'Flat- 10.17 × 18.08 ft', 'Flat- 7.94 × 8.96 ft', 'Flat- 9.32 × 10.76 ft', 'Den Flat- 8.50 × 8.56 ft', 'E3661085'),
(7, 'Flat- 10.07 × 19.98 ft', 'Flat-10.07 × 19.98 ft', 'Flat- 8.33 × 11.52 ft', 'Flat- 9.68 × 14.01 ft', '2nd bedroom Flat- 8.66 × 13.09 ft', 'E3633628'),
(8, '-', '-', '-', '-', '-', 'E3658226'),
(9, 'Main- 11.81 × 16.73 ft', 'Main- 8.53 × 12.30 ft', 'Main- 11.65 × 11.48 ft', '2nd- 10.66 × 11.32 ft', '2nd/3rd bdroom on 2nd', 'N3644370'),
(10, 'Main level -9.84 × 20.18 ft', 'Main level- 9.84 × 20.18 ft', 'Main level- 8.04 × 8.04 ft', 'Main level- 9.51 x 12.63 ft', '', 'N3654963'),
(11, 'Main- 10.99 × 20.01 ft', '', 'Main- 12.01 × 15.09 ft', '2nd- 12.99 × 17.29 ft', '2nd/3rd/4th bdroom on 2nd', 'N3652031'),
(12, 'Main	14.76 × 18.37 ft', 'Main	14.76 × 18.37 ft', 'Main	14.76 × 18.37 ft', 'Main	9.09 × 11.38 ft', '', 'W3637747'),
(13, ' Main	11.29 × 17.22 ft', 'Main	11.29 × 17.22 ft', ' Main	8.43 × 11.48 ft', 'Main	9.78 × 11.48 ft', '2nd/3rd on main 4th on lower', 'W3656476'),
(14, 'Flat	12.17 × 12.76 ft', 'Flat	12.17 × 12.76 ft', 'Flat	6.33 × 10.01 ft', 'Master 	Flat	9.15 × 11.25 ft', 'Other 	Flat	5.58 × 12.76 ft', 'C3662544'),
(15, 'Main	10.60 × 15.49 ft', 'Main	10.60 × 15.49 ft', ' Main	7.97 × 7.97 ft', 'Main	9.28 × 9.88 ft', 'Den 	Main	8.40 × 8.07 ft', 'C3651227'),
(16, 'Flat	11.19 × 11.58 ft', 'Flat	4.49 × 7.58 ft', 'Flat	6.69 × 9.84 ft', 'Flat	9.71 × 13.78 ft', 'Den 	Flat	5.68 × 7.84 ft', 'W3662937'),
(17, 'Main	10.04 × 17.65 ft', 'Main	8.17 × 10.04 ft', 'Main	7.48 × 15.29 ft', 'Main	7.05 × 16.99 ft', '2nd bedroom 	Main	7.05 × 14.04 ft', 'W3618665'),
(18, 'Main	10.83 × 19.59 ft', 'Main	10.83 × 19.59 ft', 'Main	8.27 × 9.42 ft', 'Main	10.01 × 16.17 ft', '', 'W3657912'),
(19, 'Flat	10.89 × 14.99 ft', 'Flat	10.89 × 14.99 ft', 'Flat	7.97 × 9.97 ft', 'Flat	9.88 × 10.50 ft', '', 'W3637806'),
(20, 'Flat 	11.32 × 18.70 ft', 'Flat 	8.20 × 10.17 ft', 'Flat 	7.68 × 9.51 ft', 'Flat 	12.01 × 12.20 ft', 'Two more bdrooms', 'W3658764'),
(21, 'Flat 8.04 × 15.58 ft', 'Flat 8.04 × 15.58 ft', 'Flat 8.04 × 15.58 ft', 'Flat 9.78 × 9.68 ft', '', 'C3659403'),
(22, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_utilities`
--

CREATE TABLE IF NOT EXISTS `property_utilities` (
  `id` int(9) NOT NULL,
  `heat` varchar(30) NOT NULL,
  `air_conditioning` varchar(30) NOT NULL,
  `heating_fuel` varchar(30) NOT NULL,
  `mls_id` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_utilities`
--

INSERT INTO `property_utilities` (`id`, `heat`, `air_conditioning`, `heating_fuel`, `mls_id`) VALUES
(1, 'Forced Air', 'Central Air', 'Gas', 'N3649631'),
(2, 'Forced Air', 'Central Air', 'Gas', 'N3661873'),
(3, 'Forced Air', 'Central Air', 'Gas', 'N3662235'),
(4, 'Forced Air', 'Central Air', 'Gas', 'N3653337'),
(5, 'Forced Air', 'Central Air', 'Gas', 'E3655297'),
(6, 'Forced Air', 'Central Air', 'Gas', 'E3661085'),
(7, 'Forced Air', 'Central Air', 'Gas', 'E3633628'),
(8, 'Forced Air', 'Central Air', 'Gas', 'E3658226'),
(9, 'Forced Air', 'Central Air', 'Gas', 'N3644370'),
(10, 'Forced Air', 'Central Air', 'Gas', 'N3654963'),
(11, 'Forced air', 'Central air conditioning', 'Electric', 'N3654963'),
(12, 'Forced Air', 'Central Air', 'Gas', 'N3652031'),
(13, 'Forced Air', 'Central Air', 'Gas', 'W3637747'),
(14, 'Forced Air', 'Central Air', 'Gas', 'W3656476'),
(15, 'Forced Air', 'None', 'Gas', 'W3650566'),
(16, 'Heat Pump', 'Central Air', 'Gas', 'C3662544'),
(17, 'Forced Air', 'Central Air', 'Gas', 'C3651227'),
(18, 'Forced Air', 'Central Air', 'Gas', 'W3662937'),
(19, 'Water', 'None', 'Gas', 'W3618665'),
(20, 'Forced Air', 'Central Air', 'Gas', 'W3657912'),
(21, 'Forced Air', 'Central Air', 'Gas', 'W3637806'),
(22, 'Baseboard', 'Wall Unit', 'Gas', 'W3658764'),
(23, 'Forced Air', 'Central Air', 'Gas', 'C3659403');

-- --------------------------------------------------------

--
-- Table structure for table `search_preferences`
--

CREATE TABLE IF NOT EXISTS `search_preferences` (
  `id` int(11) NOT NULL,
  `region` varchar(50) NOT NULL,
  `home_type` varchar(50) NOT NULL,
  `min_price` int(10) NOT NULL,
  `max_price` int(10) NOT NULL,
  `exterior` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_preferences`
--

INSERT INTO `search_preferences` (`id`, `region`, `home_type`, `min_price`, `max_price`, `exterior`, `email`, `status`) VALUES
(7, 'Scarborough', 'Semi-Detached', 55, 600000, '', 'peterhonline@gmail.com', 'delete'),
(8, 'toronto', 'Semi-Detached', 50, 500000, '', 'peterhonline@gmail.com', 'inactive'),
(9, 'toronto', 'Semi-Detached', 400000, 800000, '', 'peterhonline@gmail.com', 'delete'),
(10, 'toronto', 'Semi-Detached', 50, 500000, '', 'peterhonline@gmail.com', 'delete'),
(11, 'Scarborough', '', 666, 5000000, '', 'peterhonline@gmail.com', 'active'),
(12, '', 'Semi-Detached', 0, 500000, '', 'nguyenn002@gmail.com', 'active'),
(13, 'Markham', 'Detached', 136, 26340, '', 'kaokalvin@gmail.com', 'inactive'),
(14, 'Markham', 'Detached', 2, 750000, '', 'philip13@my.yorku.ca', 'active'),
(15, 'Toronto', 'Detached', 0, 900000, 'Brick', 'philip13@my.yorku.ca', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(9) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `phone_num`, `password`, `role`) VALUES
(18, 'Peter', 'Huang', 'peterhonline@gmail.com', '1111111112', 'peII.nHj2YUVk', 'customer'),
(19, 'John', 'Stewart', 'phuang@my.yorku.ca', '1112223333', 'phhLqTXrlnqfE', 'customer'),
(20, 'Nicholas', 'Nguyen', 'nguyenn002@gmail.com', '1112223333', 'ngv/NrBXMLo66', 'customer'),
(21, 'Kalvin', 'Kao', 'kaokalvin@gmail.com', '1112223333', 'ka7pnoAeXtgpE', 'customer'),
(22, 'Philip', 'Ojo', 'philip13@my.yorku.ca', '1112223333', 'phdlK8PGcqd2w', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_house_listing`
--
ALTER TABLE `favourite_house_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_details`
--
ALTER TABLE `property_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_exterior`
--
ALTER TABLE `property_exterior`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_layout`
--
ALTER TABLE `property_layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_utilities`
--
ALTER TABLE `property_utilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_preferences`
--
ALTER TABLE `search_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `favourite_house_listing`
--
ALTER TABLE `favourite_house_listing`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `property_details`
--
ALTER TABLE `property_details`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `property_exterior`
--
ALTER TABLE `property_exterior`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `property_layout`
--
ALTER TABLE `property_layout`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `property_utilities`
--
ALTER TABLE `property_utilities`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `search_preferences`
--
ALTER TABLE `search_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
