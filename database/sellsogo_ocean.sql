-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2020 at 09:53 AM
-- Server version: 10.1.44-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sellsogo_ocean`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_article`
--

CREATE TABLE `project_article` (
  `content_id` int(11) NOT NULL,
  `category_id` varchar(100) DEFAULT NULL,
  `writer_id` int(11) DEFAULT NULL,
  `lang_mode` varchar(2) NOT NULL DEFAULT 'en',
  `content_name` varchar(255) NOT NULL,
  `content_url` varchar(255) DEFAULT NULL,
  `content_desc` longtext,
  `content_short` text,
  `content_view` int(11) DEFAULT NULL,
  `content_thumb_highlight` varchar(255) DEFAULT NULL,
  `content_thumb` varchar(255) DEFAULT NULL,
  `content_date` date DEFAULT NULL,
  `status` varchar(5) NOT NULL,
  `active_status` varchar(1) NOT NULL DEFAULT 'O',
  `sort` int(11) NOT NULL DEFAULT '99999',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_desc` varchar(255) DEFAULT NULL,
  `create_dtm` datetime NOT NULL,
  `update_dtm` datetime NOT NULL,
  `create_by` varchar(5) NOT NULL,
  `update_by` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_article`
--

INSERT INTO `project_article` (`content_id`, `category_id`, `writer_id`, `lang_mode`, `content_name`, `content_url`, `content_desc`, `content_short`, `content_view`, `content_thumb_highlight`, `content_thumb`, `content_date`, `status`, `active_status`, `sort`, `meta_title`, `meta_desc`, `meta_keyword`, `og_title`, `og_desc`, `create_dtm`, `update_dtm`, `create_by`, `update_by`) VALUES
(1, '1', 2, 'th', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement', '<p><font color=\"#333333\" face=\"Roboto, sans-serif\">You’d be hard-pressed to find a business that didn’t see the value in having a page on Facebook (more than 60 million businesses already have Facebook pages).</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">A Facebook book page allows you to tell your brand story, create relationships with customers and accomplish business goals – it’s a win all around.</font></p><p><span style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif;\">Here, we’ll look at eight ways you can drive engagement with your Facebook business page, all without spending a dime.</span><br></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>1. Post Native Videos Directly to Facebook</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Rather than post your content to YouTube, try posting it to Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">When you post natively from Facebook, the video will automatically start playing as your followers scroll through their feed – it will catch their eye and before they even have time to think about it, they’re watching.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">The key here is to keep the video short.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Facebook videos that get the most engagement are 30 seconds to two minutes, with the ideal length falling at 60 to 90 seconds.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">With that in mind, keep your videos to 2 minutes or less.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><b style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 24px;\">2. Optimize Your Videos & Create Video Playlists</b></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever you post a video, also make sure to include a keyword-rich title and description, and add tags to your video – this will increase the video’s chance of showing up in relevant feeds throughout Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Then, as you start to amass a collection of SEO-rich, native Facebook videos, pop them into playlists.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">That way, more related videos will continue to be shown to the user after they’re done watching the first one.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Another way to get more engagement and video views is to feature a video.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">When you choose a video to be featured, it will top billing on your Facebook page.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><b style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 30px;\">3. Go Live</b></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Take your videos up a notch by going live.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever you go live, your video will shoot to the top of your followers’ Facebook news feeds.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">On top of that, people who have interacted with your page frequently or recently will get a notification letting them know you’re live!</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">The boost in the news feed plus those notifications are a recipe for engagement!</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">After your live broadcast is over, the video will appear on your Facebook page.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">You can then continue to promote it, embed it on your site, or share it on other social networks.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>4. Look to Facebook Insights for Data You Can Use</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Social media strategies are never one-size-fits-all.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Check your Facebook Insights at once a month and take note of the content that your audience was most engaged with.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Note not only the subject, but the format.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Use that information to guide your ongoing Facebook strategy.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">It’s a clear signal into what your unique audience wants – work to create more content along similar lines.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>5. Post Exclusive Content</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Another way to make your followers pay attention to your Facebook feed is to offer content that is exclusive to Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">For example, you can post special discounts on Facebook or release data from an upcoming case study or white paper before it’s published on your website.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Make your Facebook posts count by sharing exclusive content users won’t find anywhere else. Publicize flash sales, special discounts, contests, etc.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>6. Interact & Engage Meaningfully</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Interacting is par for the course, no matter what social media network you’re using.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever you get comments or messages, respond!</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Provide insight and guidance when people ask questions, and thank them when they offer your brand praise.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">If you’re a dedicated social media manager, try to do this throughout the day in real-time (as much as your schedule allows).</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">If you’re a business owner juggling many hats, set aside a certain amount of time to dedicate to social media – for a small business, a solid hour or even half-hour a day can make a huge difference in managing social interactions.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>7. Make the Most of User-Generated Content</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever your business is mentioned or tagged anywhere, it’s fodder for Facebook content.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Got a great Yelp review?</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Quote it and link to it on Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Did someone post an awesome picture of your business on Instagram?</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Send the poster a DM on Instagram, thank them and ask for permission to share it with photo credit on all your social channels.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Nine times out of 10 they’ll say yes, and they’ll love that you thanked them and are interacting with them (if they’re not already following you, this will most likely seal the deal).</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Wherever, whenever a user tags, mentions, reviews or writes about your brand in a positive way, get the most mileage you can out of that content.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">You can also encourage more user-generated content by hosting contests that require video or photo submissions related to your brand.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>8. Use Cinemagraphs</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">A cinemagraph is an animated photo.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">It’s technically a video file that plays in a continuous loop.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Practically, it looks like a still image with a minor piece of movement.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">For example, a photo of a woman at the beach with waves actually moving in the background, though the foreground is still.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Cinemagraphs are huge eye-catchers and will stand out in the Facebook news feed.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Stock photo sites like Shutterstock have a large library of cinemagraphs you can use in your own Facebook posts to the next level!</font></p>', 'The explosion of metrics and algorithms isn\'t just reflecting what\'s happening in the music industry. It\'s transforming it.', NULL, '63555689317820049697_thumb.png', '51615890420437936746_thumb.jpg', '2020-02-26', 'O', 'O', 1, '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '2020-02-27 16:33:25', '2020-04-10 10:31:35', '1', '1'),
(2, '3', 3, 'en', 'Top 10 Technology Trends for 2020', 'Top 10 Technology Trends for 2020', '<p>Television shows of the 1960’s like The Jetsons predicted that the 21st century would be filled with flying cars, and airborne robots would be a part of our everyday lives. October 21st, 2015 marked the point in time in which Marty McFly (Michael J. Fox) traveled to in Back to the Future Part II, the 1989 sequel to the time-travelling classic. The future he found was one which had captured the imagination of millions — instead today, we live in a world dominated by live streaming, smartphones and social networks, not flying cars or hover boards (maybe, because is this really a hover board?).</p><p>Within the span of 10 short years, or perhaps even less, service apps like Uber, Lyft, DoorDash, AirBnB and others have spawned millions of users, and can be found on almost everyone’s smart phone. Personal assistants like Siri and Alexa have entered many of our lives. It would be terribly naive for anyone to say that the world hasn’t changed in the last 10 years. This technology growth and change is likely to continue for the next decade and beyond.</p><p>It’s the roaring 20’s baby! At the start of the millennium, Information Technology was deeply concerned about Y2K … “Oh no, the zeroes and the clocks!” When the clocks struck 12 in 2000, the iPhone, Twitter, Facebook, 4k, 5G, and all the other fun things we know today didn’t exist. So what’s in store as a new decade begins?</p><p>Are you more interested in what skills you need to learn to keep pace with the technology trends of 2020?</p><p>The year 2020 brings along many game-changing technology trends that we will come to embrace (or have embraced already). While some things already exist and are common finds in the modern enterprise, other new technologies are ‘prime pickings’ to drastically change the way we live, work, and socialize. As the modern technology we know and love evolves with new use cases and even newer applications, we will begin to see the new benefits and opportunities.</p><p>The top 10 technology trends for 2020 were presented at the Gartner IT Symposium/Xpo in October 2019. Gartner predicts that the key strategic technology trends in 2020 consists of two major areas: human-centric and smart spaces.</p><p><br></p><h3><b>Hyper-automation</b></h3><p>Hyper-automation elevates task automation to the next level. It is the application of advanced technologies like Artificial intelligence (AI) and Machine learning (ML) to automate processes (not just tasks) in ways that are significantly more impactful than that of traditional automation capabilities. It’s the combination of multiple machine learning, packaged software and automation tools to deliver work. Hyper-automation requires a combination of tools to help support replicating pieces of where the human is involved in a task. This trend kicked off with robotic process automation (RPA) but will see growth with the combination of process intelligence, content intelligence, AI, OCR and other innovative technology.</p><p><br></p><h3><b>Multi-experience</b></h3><p>Multi-experience deals with the massive shift from a two-dimensional screen and keyboard interface to a much more dynamic, multi-modal kind of interface world where we’re immersed in the interactive technology and it surrounds us. Multi-experience currently focuses on immersive experiences that use augmented reality, virtual reality, mixed reality, multi-channel human-machine interfaces and sensing technologies.</p><p>AI enabled conversational platforms have changed the way in which people interact with the digital world. Beyond conversations, virtual reality (VR), augmented reality (AR) and mixed reality (MR) are changing how people perceive the digital world. This combined shift in both perception and interaction will result in the future multi-sensory and multi-modal experience. Over the next decade, this trend will become what is known as ambient experience.</p><p><br></p><h3><b>Democratization of Technology</b></h3><p>Democratization of technology refers to the process by which access to technology rapidly continues to become more accessible to more people.</p><p>The democratization of technology means providing people with easy access to technical or business expertise without extensive or expensive training. This is already widely recognized with the rise of the citizen developer. Historically, automation was managed and deployed by IT, but the emergence of robotic process automation has changed that with the emergence of digital workers. We are now seeing a new generation of citizen developers, such as business analysts, who are closer to business challenges and can program and automate digital workers to help them do their work.This trend will focus on four key areas: application development, data and analytics, design, and knowledge. According to Gartner, these may be tools designed “to generate synthetic training data, which helps address a substantial barrier to ML model development.”</p><p>New technologies and improved user experiences will empower those outside of the technical industry to access and use technological products and services.</p><p><br></p><h3><b>Human Augmentation</b></h3><p>Human augmentation explores how technology can be used to deliver cognitive and physical improvements as an integral part of the human experience. This augmentation is leveraging technology to increase human capabilities both physically and cognitively. Companies like Boston Dynamics have already developed a wide variety of human augmenting devices that can be used in factories or on the battlefield.</p><p>We have already seen the proliferation of smart devices, and smart wearables. New applications include the use of these wearables to improve worker safety in the mining industry. In other industries, such as retail and travel, wearables could be used to increase worker productivity and increase human ability.</p><p><br></p><h3><b>Transparency and Traceability</b></h3><p>Consumers who are increasingly aware that their personal information is valuable, are demanding control. Many are recognizing the increasing risk of securing and managing personal data. Beyond that, governments are implementing strict legislation to ensure they do. Transparency and traceability are critical elements to support these digital ethics and privacy needs.</p><p>More legislation similar to the European Union’s General Data Protection Regulation (GDPR) is likely to be enacted around the world in the coming years.</p><p>As many more organizations deploy AI and take advantage of machine learning to make decisions in place of humans, this is a further cause for concern. There evolves a driving need for explainable AI and AI governance. This trend requires a focus on these key elements of trust: integrity, openness, accountability, competence and consistency.</p><p><br></p><h3><b>The Empowered Edge</b></h3><p>Edge computing is a computing topology in which information processing and content collection and delivery are placed closer to the sources, repositories and consumers of this information. This allows for the reduction in latency, and it allows for some level of autonomy on these edge devices. Edge Computing was born from the need for IoT systems to deliver disconnected or distributed capabilities into the embedded IoT world.</p><p>According to Brian Burke, from Gartner, “edge computing will become a dominant factor across virtually all industries and use cases as the edge is empowered with increasingly more sophisticated and specialized compute resources and more data storage. Complex edge devices, including robots, drones, autonomous vehicles, and operational systems will accelerate this shift”.</p><p>This will extend the role of devices as the basis for smart spaces and will move key applications and services closer to the people and devices that use them.</p><p><br></p><h3><b>The Distributed Cloud</b></h3><p>Distributed cloud is how the cloud is shifting. Most have thought of the cloud as being location independent — it’s just out there; it’s up there somewhere. But now with distributed cloud, physical location of where those data centers are located becomes increasingly important. Addressing regulation issues and latency issues and those kinds of things is becoming much more important.</p><p>The cloud now expands its territory and becomes a distributed cloud, which is the distribution of public cloud services to different locations while the originating public cloud provider assumes responsibility for the operation, governance, updates to and evolution of the services. This represents a significant shift from the centralized model of most public cloud services and will lead to a new era in cloud computing.</p><p><br></p><h3><b>MORE Autonomous Things</b></h3><p>Autonomous Things are the physical devices that use artificial intelligence to automate functions previously performed by humans. The most recognizable current forms of autonomous things are robots, drones, autonomous vehicles, and appliances. The automation of these things goes beyond the automation provided by rigid programming models, and they exploit AI to deliver advanced behaviors that interact more naturally with their environments and with people.</p><p>As technology capability improves, regulation permits and social acceptance grows, more autonomous things will be deployed in uncontrolled public spaces.</p><p><br></p><h3><b>Cryptocurrency and Practical Blockchain</b></h3><p>Recognizing “practical blockchain” is important here: while blockchain has been around for a few years, it’s been slow to be commercially deployed because of some of the technical and management issues in the technology. Blockchain has the potential to reshape industries by enabling trust, providing transparency and enabling value exchange across business ecosystems, potentially lowering costs, reducing transaction settlement times and improving cash flow and the movement of materials.</p><p>The report notes that another area in which blockchain has potential is identity management. Smart contracts can be programmed into the blockchain where events can trigger actions; for example, payment is released when goods are received. However, Gartner’s Brian Burke says that blockchain remains immature for enterprise deployments due to a range of technical issues including poor scalability and interoperability. “Despite these challenges, the significant potential for disruption and revenue generation means organizations should begin evaluating blockchain, even if they don’t anticipate aggressive adoption of the technologies in the near term,” he says.</p><p>As complementary technologies such as AI and the IoT begin to integrate, blockchain will see tremendous growth in the enterprise.</p><p><br></p><h3><b>AI security</b></h3><p>Evolving technologies like hyper-automation already show how true digital transformation is changing in the business world. However, these technologies also create security vulnerabilities through potential new points of attack. Future AI security will have 3 key perspectives: 1) protection of AI-powered systems, secured AI training data, and trained pipelines and machine learning models; 2) leveraging AI to enhance security defense, and utilizing machine learning to understand patterns, uncovering attacks and automating parts of the cybersecurity processes; 3) anticipating negative use of AI by attackers — identifying these attacks and defending against them.</p><p><br></p><p>2020 anticipates great opportunities and great challenges for enterprise leaders. It is important to always remember that embracing change and adopting new technologies and trends will guarantee that your organization remains competitive in the market. Make no mistake about it, resisting change will set your company behind. Those who focus on true digital transformation will grow their business. Are you brave enough to jump into executing on these trends that will reshape the future?</p><p>Gartner’s full report, Strategic Technology Trends for 2020, can be downloaded (registration required) here.</p><div><br></div>', 'Top 10 Technology Trends for 2020', NULL, '68337075816464795205_thumb.png', '72844994306023291058_thumb.jpg', '2020-02-29', 'O', 'O', 2, 'Top 10 Technology Trends for 2020', 'Top 10 Technology Trends for 2020', 'Top 10 Technology Trends for 2020', 'Top 10 Technology Trends for 2020', 'Top 10 Technology Trends for 2020', '2020-02-27 10:55:22', '2020-04-10 11:35:25', '1', '1'),
(3, '2', 4, 'en', 'Facebook Is Still Prioritizing', 'Facebook Is Still Prioritizing', '<p><br></p><p>Facebook\'s growth at any cost mentality has birthed innumerable scandals over the past decade — election meddling, political discord, privacy invasion. Yet today, after repeated apologies and promises to do better, that mentality remains largely unchanged. BuzzFeed News has learned the company continues to evaluate and compensate product managers based mostly on their ability to grow its products, with little regard to the impact of those products on the world. In fact, for Facebook, the very word “impact” is often defined by internal growth rather than external consequences and it uses growth metrics as key criteria for evaluating performance and determining compensation changes.</p><p><br></p><p>This emphasis on growth, particularly as it’s tied to performance evaluation, encourages Facebook’s employees to focus on growth above all else, sources close to the company told BuzzFeed News.</p><p><br></p><p>“Working at Facebook made me aware of how you can reprogram humans,” one ex–product manager who recently left the company said. “It\'s hard to believe that you could get humans to override all of their values that they came in with. But with a system like this, you can. I found that a bit terrifying.”</p><p><img src=\"http://mandala.sellsogood.com//uploads/images/1585319794covid19-01.jpg\" style=\"max-width: 100%;\"><br></p><h3><b>“When you’re building something at this scale, solutions take a good amount of time.” </b></h3><p>The system this product manager described — a source of concern among others who have worked for the company — has two main components: Facebook’s data science team and its performance evaluation system. The company’s data science team has years of data at its disposal, which it uses to pinpoint how much a team should grow a product it’s working on. Facebook’s product teams use that information to set goals every six months as part of a “roadmap planning” process. The criterion is typically growth, though there are sometimes other goals as well, like reducing harmful behavior on its service.</p><p><br></p><p>Facebook calls its product managers’ ability to hit their metric “impact,” and impact can count for high percentages of product managers’ evaluations, though it varies by position and level. At the end of the evaluation process, each individual is assigned a rating by a manager — ranging from “doesn’t meet expectations” to “redefines expectations” — which is algorithmically tied to their compensation. Managers at Facebook aren’t given discretionary raise pools (raises are handed out evenly based on ratings) and there is no appeals process for evaluations, making a good rating paramount if you work at Facebook.</p><p><br></p><p>“Teams are definitely concerned about showing impact, because the best way to get more resources is to show impact and grow your metrics,” another product manager who recently left Facebook told BuzzFeed News. “I\'d say I\'m pro-metrics. But the whole thing is this: They\'re attached to performance in a way that makes it feel like they’re the end all, be all.”</p><p><br></p><p>Charles Obih, a Facebook employee who left this fall, said the system itself is imperfect and prone to manipulation. “Any system that can be gamed, will be gamed,” he said. “If you tell me my rating is attached to my pay and it\'s attached to my promotion, eventually people are going to start doing work strictly based upon getting good ratings.”</p><p><br></p><h3><b>“Eventually people are going to start doing work strictly based upon getting good ratings.”</b></h3><p>“Our performance evaluations focus on recognizing and rewarding both short and long-term work,” a Facebook spokesperson told BuzzFeed News. “Product Managers can’t have an impact without being collaborative, meaning how they get their job done matters just as much. Facebook’s long term bets like virtual reality are proof of our focus on time horizons much longer than six months.”</p><p><br></p><p>The first ex–product manager said the team managing Facebook pages gamed the system to grow the amount of “monthly active businesses.” When business page administrators did something with Facebook’s tools within a month, they’d count as active. So the team would keep sending notifications — about anything — so that they’d sign back in, helping the team hit the metric, even if they knew it would annoy users.</p><p><br></p><p>In another case, a high-ranking Facebook official told the company’s employees that people were opening the app 12 times a day, a drop from the typical 14, and that this was extremely worrying. “When he said that I was like, 100% of the people who went from 14 to 12 are happy that they went from 14 to 12. Only Facebook is unhappy about that,” the former product manager said.</p><p><br></p><p>Monomaniacal pursuit of growth has fed years of scandal for Facebook. The company has grown its user base while allowing its News Feed to fill with outrage, sensationalism, and fake news. But the great irony here is that Facebook and its leadership have consistently blamed many of the platform\'s problems and its long-time-coming fixes for them on its vast size. Recall Mark Zuckerberg\'s remarks in the aftermath of the Cambridge Analytica scandal: “When you’re building something at this scale, solutions take a good amount of time,\" he said. \"I don’t think me or anyone else can come in and have these issues resolved in a quarter or half year.\" This has become Facebook\'s go-to defense for the harms it has caused. It\'s difficult to moderate disinformation at scale. It\'s not easy to solve for hate speech at scale. Vetting ads at scale is tough. Problem is, Facebook\'s id — its most basic, instinctual drive — is the drive for scale.</p><p><br></p><h3><b>Problem is, Facebook\'s id — its most basic, instinctual drive — is the drive for scale.</b></h3><p>Operating as a publicly traded company in the zero-sum game of social media, where losing people’s interest can mean a swift shareholder decline, Facebook views growth as necessary for survival. And though growth is a goal for companies throughout Silicon Valley, and the broader economy, Facebook has codified it into its culture in a way few others have. Its intense focus on growth can impede it from pausing to consider the ramifications of its work. These discussions do happen at Facebook, but they don’t occur at the same frequency as they do inside some of its competitors, like Google.</p><p><br></p><p>Facebook has tweaked this system recently. In January, Facebook said it would change its bonus system to factor in social progress. Last year, instead of emphasizing time spent and engagement as a core metric, it asked its teams to grow “meaningful social interactions,” or back-and-forth discussions between people using Facebook. While every Facebook insider BuzzFeed News spoke with viewed this as a step in the right direction, some still expressed concerns that the company was simply substituting one metric for another, and ultimately leaving the system in place.</p><p><br></p>', 'Facebook Is Still Prioritizing Scale Over  Safety', NULL, '05402360553729698478_thumb.jpg', '83701096544087913325_thumb.jpg', '2020-02-27', 'O', 'O', 3, 'Facebook Is Still Prioritizing Scale Over  Safety', 'Facebook Is Still Prioritizing Scale Over  Safety', 'Facebook Is Still Prioritizing Scale Over  Safety', 'Facebook Is Still Prioritizing Scale Over  Safety', 'Facebook Is Still Prioritizing Scale Over  Safety', '2020-02-27 10:51:31', '2020-04-10 11:35:32', '1', '1'),
(4, '1', 2, 'en', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your', '<p><font color=\"#333333\" face=\"Roboto, sans-serif\">You’d be hard-pressed to find a business that didn’t see the value in having a page on Facebook (more than 60 million businesses already have Facebook pages).</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">A Facebook book page allows you to tell your brand story, create relationships with customers and accomplish business goals – it’s a win all around.</font></p><p><span style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif;\">Here, we’ll look at eight ways you can drive engagement with your Facebook business page, all without spending a dime.</span><br></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>1. Post Native Videos Directly to Facebook</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Rather than post your content to YouTube, try posting it to Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">When you post natively from Facebook, the video will automatically start playing as your followers scroll through their feed – it will catch their eye and before they even have time to think about it, they’re watching.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">The key here is to keep the video short.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Facebook videos that get the most engagement are 30 seconds to two minutes, with the ideal length falling at 60 to 90 seconds.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">With that in mind, keep your videos to 2 minutes or less.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><b style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 24px;\">2. Optimize Your Videos & Create Video Playlists</b></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever you post a video, also make sure to include a keyword-rich title and description, and add tags to your video – this will increase the video’s chance of showing up in relevant feeds throughout Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Then, as you start to amass a collection of SEO-rich, native Facebook videos, pop them into playlists.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">That way, more related videos will continue to be shown to the user after they’re done watching the first one.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Another way to get more engagement and video views is to feature a video.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">When you choose a video to be featured, it will top billing on your Facebook page.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><b style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 30px;\">3. Go Live</b></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Take your videos up a notch by going live.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever you go live, your video will shoot to the top of your followers’ Facebook news feeds.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">On top of that, people who have interacted with your page frequently or recently will get a notification letting them know you’re live!</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">The boost in the news feed plus those notifications are a recipe for engagement!</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">After your live broadcast is over, the video will appear on your Facebook page.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">You can then continue to promote it, embed it on your site, or share it on other social networks.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>4. Look to Facebook Insights for Data You Can Use</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Social media strategies are never one-size-fits-all.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Check your Facebook Insights at once a month and take note of the content that your audience was most engaged with.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Note not only the subject, but the format.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Use that information to guide your ongoing Facebook strategy.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">It’s a clear signal into what your unique audience wants – work to create more content along similar lines.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>5. Post Exclusive Content</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Another way to make your followers pay attention to your Facebook feed is to offer content that is exclusive to Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">For example, you can post special discounts on Facebook or release data from an upcoming case study or white paper before it’s published on your website.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Make your Facebook posts count by sharing exclusive content users won’t find anywhere else. Publicize flash sales, special discounts, contests, etc.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>6. Interact & Engage Meaningfully</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Interacting is par for the course, no matter what social media network you’re using.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever you get comments or messages, respond!</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Provide insight and guidance when people ask questions, and thank them when they offer your brand praise.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">If you’re a dedicated social media manager, try to do this throughout the day in real-time (as much as your schedule allows).</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">If you’re a business owner juggling many hats, set aside a certain amount of time to dedicate to social media – for a small business, a solid hour or even half-hour a day can make a huge difference in managing social interactions.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>7. Make the Most of User-Generated Content</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever your business is mentioned or tagged anywhere, it’s fodder for Facebook content.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Got a great Yelp review?</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Quote it and link to it on Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Did someone post an awesome picture of your business on Instagram?</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Send the poster a DM on Instagram, thank them and ask for permission to share it with photo credit on all your social channels.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Nine times out of 10 they’ll say yes, and they’ll love that you thanked them and are interacting with them (if they’re not already following you, this will most likely seal the deal).</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Wherever, whenever a user tags, mentions, reviews or writes about your brand in a positive way, get the most mileage you can out of that content.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">You can also encourage more user-generated content by hosting contests that require video or photo submissions related to your brand.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>8. Use Cinemagraphs</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">A cinemagraph is an animated photo.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">It’s technically a video file that plays in a continuous loop.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Practically, it looks like a still image with a minor piece of movement.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">For example, a photo of a woman at the beach with waves actually moving in the background, though the foreground is still.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Cinemagraphs are huge eye-catchers and will stand out in the Facebook news feed.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Stock photo sites like Shutterstock have a large library of cinemagraphs you can use in your own Facebook posts to the next level!</font></p>', 'The explosion of metrics and algorithms isn\'t just reflecting what\'s happening in the music industry. It\'s transforming it.', NULL, '63555689317820049697_thumb.png', '51615890420437936746_thumb.jpg', '2020-02-26', 'O', 'O', 1, '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '2020-02-27 16:33:25', '2020-04-10 16:45:03', '1', '1');
INSERT INTO `project_article` (`content_id`, `category_id`, `writer_id`, `lang_mode`, `content_name`, `content_url`, `content_desc`, `content_short`, `content_view`, `content_thumb_highlight`, `content_thumb`, `content_date`, `status`, `active_status`, `sort`, `meta_title`, `meta_desc`, `meta_keyword`, `og_title`, `og_desc`, `create_dtm`, `update_dtm`, `create_by`, `update_by`) VALUES
(5, '1', 2, 'en', '8 Ways to Increase', '8 Ways to Increase', '<p><font color=\"#333333\" face=\"Roboto, sans-serif\">You’d be hard-pressed to find a business that didn’t see the value in having a page on Facebook (more than 60 million businesses already have Facebook pages).</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">A Facebook book page allows you to tell your brand story, create relationships with customers and accomplish business goals – it’s a win all around.</font></p><p><span style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif;\">Here, we’ll look at eight ways you can drive engagement with your Facebook business page, all without spending a dime.</span><br></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>1. Post Native Videos Directly to Facebook</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Rather than post your content to YouTube, try posting it to Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">When you post natively from Facebook, the video will automatically start playing as your followers scroll through their feed – it will catch their eye and before they even have time to think about it, they’re watching.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">The key here is to keep the video short.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Facebook videos that get the most engagement are 30 seconds to two minutes, with the ideal length falling at 60 to 90 seconds.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">With that in mind, keep your videos to 2 minutes or less.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><b style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 24px;\">2. Optimize Your Videos & Create Video Playlists</b></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever you post a video, also make sure to include a keyword-rich title and description, and add tags to your video – this will increase the video’s chance of showing up in relevant feeds throughout Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Then, as you start to amass a collection of SEO-rich, native Facebook videos, pop them into playlists.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">That way, more related videos will continue to be shown to the user after they’re done watching the first one.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Another way to get more engagement and video views is to feature a video.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">When you choose a video to be featured, it will top billing on your Facebook page.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><b style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 30px;\">3. Go Live</b></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Take your videos up a notch by going live.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever you go live, your video will shoot to the top of your followers’ Facebook news feeds.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">On top of that, people who have interacted with your page frequently or recently will get a notification letting them know you’re live!</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">The boost in the news feed plus those notifications are a recipe for engagement!</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">After your live broadcast is over, the video will appear on your Facebook page.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">You can then continue to promote it, embed it on your site, or share it on other social networks.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>4. Look to Facebook Insights for Data You Can Use</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Social media strategies are never one-size-fits-all.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Check your Facebook Insights at once a month and take note of the content that your audience was most engaged with.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Note not only the subject, but the format.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Use that information to guide your ongoing Facebook strategy.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">It’s a clear signal into what your unique audience wants – work to create more content along similar lines.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>5. Post Exclusive Content</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Another way to make your followers pay attention to your Facebook feed is to offer content that is exclusive to Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">For example, you can post special discounts on Facebook or release data from an upcoming case study or white paper before it’s published on your website.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Make your Facebook posts count by sharing exclusive content users won’t find anywhere else. Publicize flash sales, special discounts, contests, etc.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>6. Interact & Engage Meaningfully</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Interacting is par for the course, no matter what social media network you’re using.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever you get comments or messages, respond!</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Provide insight and guidance when people ask questions, and thank them when they offer your brand praise.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">If you’re a dedicated social media manager, try to do this throughout the day in real-time (as much as your schedule allows).</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">If you’re a business owner juggling many hats, set aside a certain amount of time to dedicate to social media – for a small business, a solid hour or even half-hour a day can make a huge difference in managing social interactions.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>7. Make the Most of User-Generated Content</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Whenever your business is mentioned or tagged anywhere, it’s fodder for Facebook content.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Got a great Yelp review?</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Quote it and link to it on Facebook.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Did someone post an awesome picture of your business on Instagram?</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Send the poster a DM on Instagram, thank them and ask for permission to share it with photo credit on all your social channels.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Nine times out of 10 they’ll say yes, and they’ll love that you thanked them and are interacting with them (if they’re not already following you, this will most likely seal the deal).</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Wherever, whenever a user tags, mentions, reviews or writes about your brand in a positive way, get the most mileage you can out of that content.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">You can also encourage more user-generated content by hosting contests that require video or photo submissions related to your brand.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\"><br></font></p><h3><font color=\"#333333\" face=\"Roboto, sans-serif\"><b>8. Use Cinemagraphs</b></font></h3><p><font color=\"#333333\" face=\"Roboto, sans-serif\">A cinemagraph is an animated photo.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">It’s technically a video file that plays in a continuous loop.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Practically, it looks like a still image with a minor piece of movement.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">For example, a photo of a woman at the beach with waves actually moving in the background, though the foreground is still.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Cinemagraphs are huge eye-catchers and will stand out in the Facebook news feed.</font></p><p><font color=\"#333333\" face=\"Roboto, sans-serif\">Stock photo sites like Shutterstock have a large library of cinemagraphs you can use in your own Facebook posts to the next level!</font></p>', 'The explosion of metrics and algorithms isn\'t just reflecting what\'s happening in the music industry. It\'s transforming it.', NULL, '63555689317820049697_thumb.png', '51615890420437936746_thumb.jpg', '2020-02-26', 'O', 'O', 1, '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '8 Ways to Increase Engagement on Your Facebook Business Page', '2020-02-27 16:33:25', '2020-04-10 11:35:19', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_article_category`
--

CREATE TABLE `project_article_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_color` varchar(100) DEFAULT NULL,
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_desc` varchar(200) DEFAULT NULL,
  `meta_keyword` varchar(200) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_desc` varchar(255) DEFAULT NULL,
  `status` varchar(5) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '99999',
  `create_dtm` datetime NOT NULL,
  `update_dtm` datetime NOT NULL,
  `create_by` varchar(5) NOT NULL,
  `update_by` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_article_category`
--

INSERT INTO `project_article_category` (`category_id`, `category_name`, `category_color`, `meta_title`, `meta_desc`, `meta_keyword`, `og_title`, `og_desc`, `status`, `sort`, `create_dtm`, `update_dtm`, `create_by`, `update_by`) VALUES
(1, 'Guide', '#ffd0bc', 'Guide', 'Guide', 'Guide', 'Guide', 'Guide', 'O', 1, '2020-02-25 15:59:06', '2020-02-28 17:20:13', '1', '1'),
(2, 'Tech', '#8eefe1', NULL, NULL, NULL, NULL, NULL, 'O', 2, '2020-02-25 15:59:32', '2020-02-27 14:18:27', '1', '1'),
(3, 'Trends', '#9fdeff', NULL, NULL, NULL, NULL, NULL, 'O', 3, '2020-02-25 16:00:04', '2020-02-27 14:18:28', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_article_writer`
--

CREATE TABLE `project_article_writer` (
  `writer_id` int(11) NOT NULL,
  `writer_name` varchar(255) NOT NULL,
  `writer_position` varchar(100) DEFAULT NULL,
  `writer_thumb` varchar(100) DEFAULT NULL,
  `company_thumb` varchar(100) DEFAULT NULL,
  `status` varchar(5) NOT NULL,
  `create_dtm` datetime NOT NULL,
  `update_dtm` datetime NOT NULL,
  `create_by` varchar(5) NOT NULL,
  `update_by` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_article_writer`
--

INSERT INTO `project_article_writer` (`writer_id`, `writer_name`, `writer_position`, `writer_thumb`, `company_thumb`, `status`, `create_dtm`, `update_dtm`, `create_by`, `update_by`) VALUES
(1, 'Dr. Akalak Yimwilai', 'CEO and Founder', '82259971340136073442_thumb.png', '31714308659925478104_thumb.png', 'O', '2020-02-25 16:03:06', '2020-02-25 16:22:28', '1', '1'),
(2, 'Kristi Kellogg', 'CEO and Founder at Dazzling Digital', '72987586460295321304_thumb.png', NULL, 'O', '2020-02-27 20:14:21', '2020-02-27 20:14:21', '1', '1'),
(3, 'Ryan M. Raike', 'Former SME & GOV consultant. Process Expert | Sr. Product Marketing Manager, ABBYY | Process IQ Guy', '09825616708717063444_thumb.png', NULL, 'O', '2020-02-27 20:16:22', '2020-04-04 11:42:53', '1', '1'),
(4, 'Alex Kantrowitz', 'BuzzFeed News Reporter', '57925658470074941160_thumb.png', NULL, 'O', '2020-02-27 20:16:55', '2020-02-27 20:16:55', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_content`
--

CREATE TABLE `project_content` (
  `content_id` int(11) NOT NULL,
  `category_id` varchar(10) DEFAULT NULL,
  `content_name` varchar(255) NOT NULL,
  `content_desc` text NOT NULL,
  `content_thumb` varchar(255) DEFAULT NULL,
  `content_link` varchar(255) DEFAULT NULL,
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_desc` varchar(200) DEFAULT NULL,
  `meta_keyword` varchar(200) DEFAULT NULL,
  `status` varchar(5) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '99999',
  `create_dtm` datetime NOT NULL,
  `update_dtm` datetime NOT NULL,
  `create_by` varchar(5) NOT NULL,
  `update_by` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_content`
--

INSERT INTO `project_content` (`content_id`, `category_id`, `content_name`, `content_desc`, `content_thumb`, `content_link`, `meta_title`, `meta_desc`, `meta_keyword`, `status`, `sort`, `create_dtm`, `update_dtm`, `create_by`, `update_by`) VALUES
(1, NULL, 'Content qweqwe', '<p>Content qweqew<br></p>', '58363201625094949761_thumb.png', 'www.google.com', 'Content 1ss', 'Content 1xxx', 'Content 1aa', 'O', 99999, '2020-02-20 20:48:26', '2020-02-23 15:32:42', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_language`
--

CREATE TABLE `project_language` (
  `id` int(11) NOT NULL,
  `lang_name` varchar(100) NOT NULL,
  `lang_thumb` varchar(255) NOT NULL,
  `lang_lang` varchar(100) NOT NULL,
  `lang_prefix` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL,
  `default` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_language`
--

INSERT INTO `project_language` (`id`, `lang_name`, `lang_thumb`, `lang_lang`, `lang_prefix`, `status`, `default`) VALUES
(1, 'Thai', 'th_1.gif', '_thai', 'th', 'O', 'A'),
(2, 'English', 'en_2.jpg', '_english', 'en', 'O', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `project_language_layout`
--

CREATE TABLE `project_language_layout` (
  `id` int(11) NOT NULL,
  `layout_prefix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `layout_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `layout_desc_th` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `layout_desc_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active_status` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_dtm` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_dtm` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_language_layout`
--

INSERT INTO `project_language_layout` (`id`, `layout_prefix`, `layout_name`, `layout_desc_th`, `layout_desc_en`, `status`, `active_status`, `create_dtm`, `create_by`, `update_dtm`, `update_by`) VALUES
(1, '_home', 'หน้าหลัก', 'หน้าหลัก', 'Home', 'O', 'O', '2016-08-06 09:06:31', 1, '2016-08-06 15:04:06', 1),
(2, '_product', 'สินค้า', 'สินค้า', 'Product', 'O', 'O', '2016-08-06 09:32:07', 1, '2016-08-06 14:12:35', 1),
(3, '2', '2', '2', '2', 'C', 'C', '2016-08-06 13:45:31', 1, '2016-08-06 14:10:16', 1),
(4, '_contact', 'ติดต่อเรา', 'ติดต่อเรา', 'Contact Us', 'O', 'O', '2016-08-06 14:12:14', 1, '2016-08-06 14:13:15', 1),
(5, '_aboutus', 'เกี่ยวกับเรา', 'เกี่ยวกับเรา', 'About Us', 'O', 'O', '2016-08-06 14:13:58', 1, '2017-08-27 16:13:08', 1),
(6, '_more_call', 'เพิ่มเติม โทร', 'สายด่วนความงาม', 'Hotline', 'O', 'O', '2016-08-06 14:17:31', 1, '2016-10-22 00:45:01', 33),
(7, '_login', 'ลงชื่อเข้าใช้', 'ลงชื่อเข้าใช้', 'Login', 'O', 'O', '2016-08-06 14:18:09', 1, NULL, NULL),
(8, '_register', 'ลงทะเบียน (ฟรี)', 'ลงทะเบียน (ฟรี)', 'Register', 'O', 'O', '2016-08-06 14:18:41', 1, NULL, NULL),
(9, '_term', 'Terms and conditions', 'Terms and conditions', 'Terms and conditions', 'O', 'O', '2016-08-06 14:19:31', 1, NULL, NULL),
(10, '_privacy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'O', 'O', '2016-08-06 14:20:01', 1, NULL, NULL),
(11, '_item_cart', 'รายการในรถเข็น', 'รายการในรถเข็น', 'items in cart', 'O', 'O', '2016-08-06 14:22:26', 1, '2016-08-06 15:04:20', 1),
(12, '_home_blog_1', 'WE LOVE OUR CUSTOMERS', 'WE LOVE OUR CUSTOMERS', 'WE LOVE OUR CUSTOMERS', 'O', 'O', '2016-08-06 14:23:15', 1, '2016-10-15 01:02:27', 1),
(13, '_home_blog_1_desc', 'OR', 'หรือ', 'OR', 'O', 'O', '2016-08-06 14:24:18', 1, '2016-11-03 19:34:49', 1),
(14, '_home_blog_2', 'BEST PRICES', 'BEST PRICES', 'BEST PRICES', 'O', 'O', '2016-08-06 14:24:40', 1, NULL, NULL),
(15, '_home_blog_2_desc', 'รายละเอียด BEST PRICES', 'You can check that the height of the boxes adjust when longer text like this one is used in one of them.', 'You can check that the height of the boxes adjust when longer text like this one is used in one of them.', 'O', 'O', '2016-08-06 14:25:27', 1, NULL, NULL),
(16, '_home_blog_3', '100% SATISFACTION GUARANTEED', '100% SATISFACTION GUARANTEED', '100% SATISFACTION GUARANTEED', 'O', 'O', '2016-08-06 14:25:55', 1, NULL, NULL),
(17, '_home_blog_3_desc', 'รายละเอียด 100% SATISFACTION GUARANTEED', 'Free returns on everything for 3 months.', 'Free returns on everything for 3 months.', 'O', 'O', '2016-08-06 14:26:36', 1, NULL, NULL),
(18, '_home_article', 'จากบทความของเรา', 'จากบทความของเรา', 'FROM OUR ARTICLE', 'O', 'O', '2016-08-06 14:32:45', 1, NULL, NULL),
(19, '_home_article_desc', 'รายละเอียด จากบทความของเรา', 'What\'s new in the world of fashion?', 'What\'s new in the world of fashion?', 'O', 'O', '2016-08-06 14:34:17', 1, NULL, NULL),
(20, '_home_article_desc_2', 'ตรวจสอบบทความของคุณ', 'ตรวจสอบบทความของคุณ', 'Check our Article!', 'O', 'O', '2016-08-06 14:35:16', 1, NULL, NULL),
(21, '_by', 'by', 'โดย', 'By', 'O', 'O', '2016-08-06 14:36:08', 1, NULL, NULL),
(22, '_in', 'in', 'ใน', 'In', 'O', 'O', '2016-08-06 14:36:30', 1, NULL, NULL),
(23, '_page', 'หน้า', 'หน้า', 'Pages', 'O', 'O', '2016-08-06 14:36:56', 1, NULL, NULL),
(24, '_user_section', 'ส่วนผู้ใช้', 'ส่วนผู้ใช้', 'User section', 'O', 'O', '2016-08-06 14:38:03', 1, NULL, NULL),
(25, '_fine_us', 'ค้นหาเราได้จากที่ไหน', 'ค้นหาเราได้จากที่ไหน', 'Where to find us', 'O', 'O', '2016-08-06 14:39:03', 1, NULL, NULL),
(26, '_go_to_contact', 'ไปที่หน้าติดต่อเรา', 'ไปที่หน้าติดต่อเรา', 'Go to contact page', 'O', 'O', '2016-08-06 14:39:52', 1, NULL, NULL),
(27, '_enews', 'รับข่าวสารจาก', 'รับข่าวสารจาก', 'Get the news', 'O', 'O', '2016-08-06 14:40:46', 1, NULL, NULL),
(28, '_enews_desc', 'รายละเอียด enews', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'O', 'O', '2016-08-06 14:41:26', 1, NULL, NULL),
(29, '_subscribe', 'ติดตาม', 'ติดตาม !', 'Subscribe !', 'O', 'O', '2016-08-06 14:42:32', 1, '2016-08-07 09:31:02', 1),
(30, '_social_list', 'ช่องทางการติดต่ออื่นๆ', 'ช่องทางการติดต่อๆ', 'Stay in touch', 'O', 'O', '2016-08-06 14:43:34', 1, NULL, NULL),
(31, '_alert_email_register', 'alert register email', 'กรุณาใส่ข้อมูลอีเมล์', 'Please enter your email address.', 'O', 'O', '2016-08-07 03:44:11', 1, NULL, NULL),
(32, '_alert_password_register', 'alert register password', 'กรุณาใส่ข้อมูลรหัสผ่าน', 'Please enter your password.', 'O', 'O', '2016-08-07 03:45:00', 1, NULL, NULL),
(33, '_alert_password_register', 'alert register password', 'กรุณาใส่ข้อมูลรหัสผ่าน', 'Please enter your password.', 'C', 'O', '2016-08-07 03:45:13', 1, '2016-08-07 03:45:39', 1),
(34, '_signin', 'ลงชื่อเข้าใช้งาน', 'ลงชื่อเข้าใช้งาน', 'Sign In', 'O', 'O', '2016-08-07 03:49:38', 1, NULL, NULL),
(35, '_welcom', 'ยินดีต้อนรับ', 'ยินดีต้อนรับ', 'Welcome', 'O', 'O', '2016-08-07 03:51:59', 1, NULL, NULL),
(36, '_not_member', 'ยังไม่ได้เป็นสมาชิก', 'ยังไม่ได้เป็นสมาชิก ?', 'Not a member ?', 'O', 'O', '2016-08-07 03:54:11', 1, '2016-08-07 03:54:30', 1),
(37, '_register_now', 'สมัครสมาชิกตอนนี้ (ฟรี)', 'สมัครสมาชิกตอนนี้ (ฟรี)', 'Register now (free).', 'O', 'O', '2016-08-07 03:54:58', 1, NULL, NULL),
(38, '_simple_step', 'ง่าย ๆ เพียงไม่กี่ขั้นตอน', 'ง่าย ๆ เพียงไม่กี่ขั้นตอน', 'Just a few simple steps.', 'O', 'O', '2016-08-07 03:55:54', 1, NULL, NULL),
(39, '_hom_apara', 'หน้าหลัก บริษัท สยาม อะพาร่า จำกัด', 'หน้าหลัก บริษัท สยาม อะพาร่า จำกัด', 'Apara\'s Homepage', 'O', 'O', '2016-08-07 03:57:06', 1, NULL, NULL),
(40, '_email', 'email', 'อีเมล์', 'E-Mail', 'O', 'O', '2016-08-07 04:24:07', 1, NULL, NULL),
(41, '_password', 'รหัสผ่าน', 'รหัสผ่าน', 'Password', 'O', 'O', '2016-08-07 04:24:51', 1, NULL, NULL),
(42, '_alert_email_format', 'กรุณาตรวจสอบรูปแบบอีเมล์', 'กรุณาตรวจสอบรูปแบบอีเมล์', 'Please check your e-mail format.', 'O', 'O', '2016-08-07 04:35:56', 1, NULL, NULL),
(43, '_alert_email_dup', 'ไม่สามารใช้อีเมล์นี้ได้ กรุณาลองใหม่..', 'ไม่สามารใช้อีเมล์นี้ได้ กรุณาลองใหม่..', 'Can not use this email. Please try again ..', 'O', 'O', '2016-08-07 04:48:28', 1, NULL, NULL),
(44, '_alert_email_dup', 'ไม่สามารใช้อีเมล์นี้ได้ กรุณาลองใหม่..', 'ไม่สามารใช้อีเมล์นี้ได้ กรุณาลองใหม่..', 'Can not use this email. Please try again ..', 'C', 'O', '2016-08-07 06:08:00', 1, '2016-08-30 13:01:43', 1),
(45, '_login', 'เข้าสู่ระบบ', 'เข้าสู่ระบบ', 'Log in', 'O', 'O', '2016-08-07 06:16:17', 1, NULL, NULL),
(46, '_name_surname', 'ชื่อ - สกุล', 'ชื่อ - สกุล', 'Name-Surname', 'O', 'O', '2016-08-07 06:24:11', 1, NULL, NULL),
(47, '_tel', 'หมายเลขโทรศัพท์', 'หมายเลขโทรศัพท์', 'Telephone No.', 'O', 'O', '2016-08-07 06:25:30', 1, NULL, NULL),
(48, '_tel', 'หมายเลขโทรศัพท์', 'หมายเลขโทรศัพท์', 'Telephone No.', 'C', 'O', '2016-08-07 06:29:37', 1, '2016-08-20 06:48:08', 1),
(49, '_pass_not_match', 'รหัสผ่านไม่ถูกต้อง', 'รหัสผ่านไม่ถูกต้อง', 'Password not match.', 'O', 'O', '2016-08-07 06:41:59', 1, NULL, NULL),
(50, '_not_email', 'อีเมล์ไม่ถูกต้อง', 'อีเมล์ไม่ถูกต้อง', 'E-Mail address Invalid.', 'O', 'O', '2016-08-07 06:43:11', 1, NULL, NULL),
(51, '_birthday', 'วันเกิด', 'วันเกิด', 'Birth Day', 'O', 'O', '2016-08-07 06:45:58', 1, NULL, NULL),
(52, '_address', 'ที่อยู่', 'ที่อยู่', 'Address', 'O', 'O', '2016-08-07 06:46:36', 1, NULL, NULL),
(53, '_alert_enter_name', 'กรุณากรอก ชื่อ-สกุล', 'กรุณากรอก ชื่อ-สกุล', 'Please enter name - surname.', 'O', 'O', '2016-08-07 07:00:58', 1, NULL, NULL),
(54, '_alert_enter', 'กรุณากรอก', 'กรุณากรอก', 'Please enter', 'O', 'O', '2016-08-07 07:03:35', 1, NULL, NULL),
(55, '_alert_choose', 'กรุณาเลือก', 'กรุณาเลือก', 'Please choose', 'O', 'O', '2016-08-07 07:05:08', 1, NULL, NULL),
(56, '_loading', 'กำลังโหลด', 'กำลังโหลด . . .', 'Loading . . .', 'O', 'O', '2016-08-07 08:16:45', 1, NULL, NULL),
(57, '_success', 'ทำรายการเรียบร้อย', 'ทำรายการเรียบร้อย . . .', 'Completed . . .', 'O', 'O', '2016-08-07 08:53:35', 1, NULL, NULL),
(58, '_user_section', 'ส่วนของผู้ใช้', 'ส่วนของผู้ใช้', 'User section', 'O', 'O', '2016-08-07 09:26:30', 1, NULL, NULL),
(59, '_user_section', 'ส่วนของผู้ใช้', 'ส่วนของผู้ใช้', 'User section', 'O', 'O', '2016-08-07 09:28:26', 1, NULL, NULL),
(60, '_faq', 'คำถามที่พบบ่อย', 'คำถามที่พบบ่อย', 'FAQ', 'O', 'O', '2016-08-07 09:32:39', 1, NULL, NULL),
(61, '_showing', 'แสดง', 'แสดง', 'Showing', 'O', 'O', '2016-08-07 10:54:47', 1, NULL, NULL),
(62, '_of', 'จาก', 'จาก', 'of', 'O', 'O', '2016-08-07 10:55:41', 1, NULL, NULL),
(63, '_products', 'ผลิตภัณฑ์', 'ผลิตภัณฑ์', 'Products', 'O', 'O', '2016-08-07 10:56:26', 1, NULL, NULL),
(64, '_all', 'ทั้งหมด', 'ทั้งหมด', 'All', 'O', 'O', '2016-08-07 10:57:50', 1, NULL, NULL),
(65, '_sortby', 'เรียงตาม', 'เรียงตาม', 'Sort by', 'O', 'O', '2016-08-07 10:58:24', 1, '2016-08-07 11:02:31', 1),
(66, '_price', 'ราคา', 'ราคา', 'Price', 'O', 'O', '2016-08-07 10:58:52', 1, NULL, NULL),
(67, '_salefirst', 'ขายครั้งแรก', 'ขายครั้งแรก', 'Sales first', 'O', 'O', '2016-08-07 10:59:41', 1, NULL, NULL),
(68, '_name', 'ชื่อ', 'ชื่อ', 'Name', 'O', 'O', '2016-08-07 11:00:13', 1, NULL, NULL),
(69, '_add_to_cart', 'เพิ่มลงตะกร้า', 'เพิ่มลงตะกร้า', 'Add to cart', 'O', 'O', '2016-08-07 11:05:58', 1, NULL, NULL),
(70, '_thb', 'บาท', 'บาท', 'THB', 'O', 'O', '2016-08-07 11:09:12', 1, NULL, NULL),
(71, '_view_detail', 'ดูรายละเอียด', 'ดูรายละเอียด', 'View detail', 'O', 'O', '2016-08-07 11:10:08', 1, NULL, NULL),
(72, '_scroll_detail', 'เลื่อนไปที่รายละเอียดของผลิตภัณฑ์', 'เลื่อนไปที่รายละเอียดของผลิตภัณฑ์', 'Scroll to product details', 'O', 'O', '2016-08-07 12:59:53', 1, NULL, NULL),
(73, '_add_to_wishlist', 'รายการชื่นชอบ', 'รายการชื่นชอบ', 'Add to wishlist', 'O', 'O', '2016-08-07 13:04:01', 1, NULL, NULL),
(74, '_sale', 'ลดราคา', 'ลดราคา', 'SALE', 'O', 'O', '2016-08-07 13:05:01', 1, NULL, NULL),
(75, '_new', 'ใหม่', 'ใหม่', 'NEW', 'O', 'O', '2016-08-07 13:05:17', 1, NULL, NULL),
(76, '_product_size', 'ขนาดสินค้า', 'ขนาดสินค้า', 'Product Size', 'O', 'O', '2016-08-07 13:50:55', 1, NULL, NULL),
(77, '_product_detail', 'รายละเอียดสินค้า', 'รายละเอียดสินค้า', 'Product Details', 'O', 'O', '2016-08-07 13:54:08', 1, NULL, NULL),
(78, '_show_list', 'แสดงให้เพื่อนของคุณ', 'แสดงให้เพื่อนของคุณ', 'Show it to your friends', 'O', 'O', '2016-08-07 13:56:27', 1, NULL, NULL),
(79, '_continue_read', 'อ่านต่อ', 'อ่านต่อ', 'Continue Reading', 'O', 'O', '2016-08-09 11:45:46', 1, NULL, NULL),
(80, '_catetagory', 'หมวดหมู่', 'หมวดหมู่', 'Category', 'O', 'O', '2016-08-09 12:10:09', 1, '2016-09-24 11:17:41', 33),
(81, '_article_list', 'รายชื่อบทความ', 'รายชื่อบทความ', 'Article listing', 'O', 'O', '2016-08-09 12:12:23', 1, NULL, NULL),
(82, '_article', 'บทความ', 'บทความ', 'Article', 'O', 'O', '2016-08-09 12:18:34', 1, NULL, NULL),
(83, '_heade_blog', 'จากบทความของเรา', 'จากบทความของเรา', 'FROM OUR ARTICLE', 'O', 'O', '2016-08-09 12:28:53', 1, NULL, NULL),
(84, '_shat_new', 'ข้อความบทความ', 'มีอะไรใหม่เกียวกับผลิตภัณฑ์ของเรา', 'What\'s new product?', 'O', 'O', '2016-08-09 12:29:59', 1, '2016-09-23 05:46:23', 1),
(85, '_check_article', 'ตรวจสอบบทความของเรา', 'ตรวจสอบบทความของเรา !', 'Check our article !', 'O', 'O', '2016-08-09 12:31:27', 1, NULL, NULL),
(86, '_older', 'เก่ากว่า', 'เก่ากว่า', 'OLDER', 'O', 'O', '2016-08-09 12:36:27', 1, NULL, NULL),
(87, '_newer', 'ใหม่กว่า', 'ใหม่กว่า', 'NEWER', 'O', 'O', '2016-08-09 12:37:11', 1, NULL, NULL),
(88, '_contact_form', 'แบบฟอร์มการติดต่อ', 'แบบฟอร์มการติดต่อ', 'Contact form', 'O', 'O', '2016-08-11 16:48:19', 1, NULL, NULL),
(89, '_lastname', 'นามสกุล', 'นามสกุล', 'Lastname', 'O', 'O', '2016-08-11 16:49:35', 1, NULL, NULL),
(90, '_subject', 'เรื่อง', 'เรื่อง', 'Subject', 'O', 'O', '2016-08-11 16:50:32', 1, NULL, NULL),
(91, '_message', 'ข้อความ', 'ข้อความ', 'Message', 'O', 'O', '2016-08-11 16:53:09', 1, NULL, NULL),
(92, '_send_message', 'ส่งข้อความ', 'ส่งข้อความ', 'Send message', 'O', 'O', '2016-08-11 16:54:37', 1, NULL, NULL),
(93, '_tel_home', 'เบอร์โทรหน้าหลัก', '080-0000000', '080-0000000', 'O', 'O', '2016-08-11 17:04:00', 1, '2016-08-23 00:00:50', 1),
(94, '_title_home', 'APARA SKINCARE', 'APARA SKINCARE', 'Apara Ltd.', 'O', 'O', '2016-08-11 17:11:48', 1, '2016-09-24 11:15:33', 33),
(95, '_key_home', 'บริษัท สยาม อะพาร่า จำกัด Keyword', 'บริษัท สยาม อะพาร่า จำกัด', 'Apara Ltd.', 'O', 'O', '2016-08-11 17:13:14', 1, NULL, NULL),
(96, '_desc_home', 'บริษัท สยาม อะพาร่า จำกัด DESCRIPTION', 'บริษัท สยาม อะพาร่า จำกัด', 'Apara Ltd.', 'O', 'O', '2016-08-11 17:13:48', 1, NULL, NULL),
(97, '_shopping_cart', 'ตะกร้าช้อปปิ้ง', 'ตะกร้าช้อปปิ้ง', 'Shopping cart', 'O', 'O', '2016-08-13 02:55:37', 1, NULL, NULL),
(98, '_quantity', 'จำนวน', 'จำนวน', 'Quantity', 'O', 'O', '2016-08-13 02:57:15', 1, NULL, NULL),
(99, '_unit_price', 'ราคาต่อหน่วย', 'ราคาต่อหน่วย', 'Unit price', 'O', 'O', '2016-08-13 02:57:55', 1, NULL, NULL),
(100, '_discount', 'ส่วนลด', 'ส่วนลด', 'Discount', 'O', 'O', '2016-08-13 02:58:29', 1, NULL, NULL),
(101, '_total', 'ทั้งหมด', 'ทั้งหมด', 'Total', 'O', 'O', '2016-08-13 02:59:20', 1, NULL, NULL),
(102, '_you_have', 'ขณะนี้คุณมี', 'ขณะนี้คุณมี', 'You currently have', 'O', 'O', '2016-08-13 03:08:36', 1, NULL, NULL),
(103, '_you_have_item', 'รายการ ในรถเข็นของคุณ', 'รายการ ในรถเข็นของคุณ', 'item(s) in your cart.', 'O', 'O', '2016-08-13 03:09:22', 1, NULL, NULL),
(104, '_order_summary', 'สรุปการสั่งซื้อ', 'สรุปการสั่งซื้อ', 'Order summary', 'O', 'O', '2016-08-13 03:14:03', 1, NULL, NULL),
(105, '_order_subtotal', 'ผลรวมยอดการสั่งซื้อสินค้า', 'ผลรวมยอดการสั่งซื้อสินค้า', 'Order subtotal', 'O', 'O', '2016-08-13 03:16:27', 1, '2016-10-22 01:01:01', 33),
(106, '_shipping_and_handling', 'การจัดส่งและการจัดการ', 'การจัดส่งและการจัดการ', 'Shipping and handling', 'O', 'O', '2016-08-13 03:17:24', 1, NULL, NULL),
(107, '_tax', 'ภาษี', 'ภาษี', 'Tax', 'O', 'O', '2016-08-13 03:17:48', 1, NULL, NULL),
(108, '_shipping_and_additional', 'การจัดส่งและค่าใช้จ่ายเพิ่มเติมจะคำนวณตามค่าที่คุณได้ป้อน', 'การจัดส่งและค่าใช้จ่ายเพิ่มเติมจะคำนวณตามค่าที่คุณได้ป้อน', 'Shipping and additional costs are calculated based on the values you have entered.', 'O', 'O', '2016-08-13 03:20:46', 1, NULL, NULL),
(109, '_continue_shopping', 'ช้อปปิ้งต่อ', 'ช้อปปิ้งต่อ', 'Continue shopping', 'O', 'O', '2016-08-13 03:28:59', 1, NULL, NULL),
(110, '_update_basket', 'ปรับปรุงตะกร้า', 'ปรับปรุงตะกร้า', 'Update basket', 'O', 'O', '2016-08-13 03:30:39', 1, NULL, NULL),
(111, '_proceed_to_checkout', 'ดำเนินการชำระเงิน', 'ดำเนินการชำระเงิน', 'Proceed to checkout', 'O', 'O', '2016-08-13 03:31:05', 1, NULL, NULL),
(112, '_coupon_code', 'รหัสคูปอง', 'รหัสคูปอง', 'Coupon code', 'O', 'O', '2016-08-13 03:32:47', 1, NULL, NULL),
(113, '_desc_coupon', 'หากคุณมีรหัสคูปองกรุณาใส่ไว้ในช่องด้านล่างและกดปุ่มค้นหา', 'หากคุณมีรหัสคูปองกรุณาใส่ไว้ในช่องด้านล่างและกดปุ่มค้นหา', 'If you have a coupon code, please enter it in the box below and click button.', 'O', 'O', '2016-08-13 03:33:40', 1, '2016-09-03 13:59:24', 1),
(114, '_continue_without_login', 'ดำเนินการต่อโดยไม่ต้องเข้าสู่ระบบ', 'ดำเนินการต่อโดยไม่ต้องเข้าสู่ระบบ', 'Continue without login.', 'O', 'O', '2016-08-13 03:56:08', 1, NULL, NULL),
(115, '_i_have_account', 'ฉันมีบัญชีผู้ใช้อยู่แล้ว', 'ฉันมีบัญชีผู้ใช้อยู่แล้ว', 'I have an account already.', 'O', 'O', '2016-08-13 03:56:56', 1, NULL, NULL),
(116, '_user_login', 'การเข้าสู่ระบบของผู้ใช้', 'การเข้าสู่ระบบของผู้ใช้', 'User Login', 'O', 'O', '2016-08-13 05:40:19', 1, NULL, NULL),
(117, '_payment_method', 'วิธีการชำระเงิน', 'วิธีการชำระเงิน', 'Payment Method', 'O', 'O', '2016-08-13 05:42:15', 1, NULL, NULL),
(118, '_order_review', 'ตรวจสอบใบสั่งซื้อ', 'ตรวจสอบใบสั่งซื้อ', 'Order Review', 'O', 'O', '2016-08-13 05:43:26', 1, NULL, NULL),
(119, '_please_login', 'กรุณาเข้าสู่ระบบ', 'กรุณาเข้าสู่ระบบ', 'Please login', 'O', 'O', '2016-08-14 09:27:01', 1, NULL, NULL),
(120, '_my_wishlist', 'รายการโปรดของฉัน', 'รายการโปรดของฉัน', 'My wishlist', 'O', 'O', '2016-08-14 10:59:26', 1, NULL, NULL),
(121, '_my_orders', 'รายการสั่งซื้อของฉัน', 'รายการสั่งซื้อของฉัน', 'My orders', 'O', 'O', '2016-08-14 11:03:35', 1, NULL, NULL),
(122, '_my_account', 'บัญชีของฉัน', 'บัญชีของฉัน', 'My account', 'O', 'O', '2016-08-14 11:04:18', 1, NULL, NULL),
(123, '_logout', 'ออกจากระบบ', 'ออกจากระบบ', 'Logout', 'O', 'O', '2016-08-14 11:04:47', 1, NULL, NULL),
(124, '_notfound', 'ไม่มีข้อมูล', 'ไม่มีข้อมูล', 'No Information', 'O', 'O', '2016-08-14 11:14:46', 1, NULL, NULL),
(125, '_change_password', 'เปลี่ยนรหัสผ่าน', 'เปลี่ยนรหัสผ่าน', 'Change password', 'O', 'O', '2016-08-14 11:45:13', 1, NULL, NULL),
(126, '_old_password', 'รหัสผ่านเก่า', 'รหัสผ่านเก่า', 'Old password', 'O', 'O', '2016-08-14 11:45:51', 1, NULL, NULL),
(127, '_new_password', 'รหัสผ่านใหม่', 'รหัสผ่านใหม่', 'New password', 'O', 'O', '2016-08-14 11:46:30', 1, NULL, NULL),
(128, '_retype_new_password', 'พิมพ์รหัสผ่านใหม่อีกครั้ง', 'พิมพ์รหัสผ่านใหม่อีกครั้ง', 'Retype new password', 'O', 'O', '2016-08-14 11:48:13', 1, '2016-08-14 11:52:00', 1),
(129, '_save_new_password', 'บันทึกรหัสผ่านใหม่', 'บันทึกรหัสผ่านใหม่', 'Save new password', 'O', 'O', '2016-08-14 11:48:48', 1, NULL, NULL),
(130, '_change_your_personal', 'เปลี่ยนรายละเอียดส่วนบุคคลของคุณหรือรหัสผ่านของคุณที่นี่', 'เปลี่ยนรายละเอียดส่วนบุคคลของคุณหรือรหัสผ่านของคุณที่นี่', 'Change your personal details or your password here.', 'O', 'O', '2016-08-14 11:50:33', 1, NULL, NULL),
(131, '_personal_details', 'ข้อมูลส่วนตัว', 'ข้อมูลส่วนตัว', 'Personal details', 'O', 'O', '2016-08-14 11:54:11', 1, NULL, NULL),
(132, '_save_changes', 'บันทึกการเปลี่ยนแปลง', 'บันทึกการเปลี่ยนแปลง', 'Save changes', 'O', 'O', '2016-08-14 12:00:28', 1, NULL, NULL),
(133, '_free', 'EMS ฟรี', 'EMS ฟรี', 'EMS Free', 'O', 'O', '2016-08-17 11:45:52', 1, NULL, NULL),
(134, '_sign_in_by', 'เข้าสู่ระบบ โดย', 'เข้าสู่ระบบ โดย', 'Sign In by', 'O', 'O', '2016-08-20 03:47:08', 1, NULL, NULL),
(135, '_continue_to', 'ไปขั้นตอน', 'ไปขั้นตอน', 'Continue to', 'O', 'O', '2016-08-20 03:50:59', 1, '2016-08-20 04:30:24', 1),
(136, '_back_to_basket', 'กลับไปที่ตะกร้า', 'กลับไปที่ตะกร้า', 'Back to basket', 'O', 'O', '2016-08-20 04:06:19', 1, NULL, NULL),
(137, '_checkout', 'เช็คเอาท์', 'เช็คเอาท์', 'Checkout', 'O', 'O', '2016-08-20 04:08:11', 1, NULL, NULL),
(138, '_back_to', 'กลับไป', 'กลับไป', 'Back to', 'O', 'O', '2016-08-20 04:28:40', 1, NULL, NULL),
(139, '_place_an_order', 'สั่งซื้อสินค้า', 'สั่งซื้อสินค้า', 'Place an order', 'O', 'O', '2016-08-20 04:39:43', 1, NULL, NULL),
(140, '_alley', 'ซอย', 'ซอย', 'Alley', 'O', 'O', '2016-08-20 06:06:54', 1, NULL, NULL),
(141, '_street', 'ถนน', 'ถนน', 'Street', 'O', 'O', '2016-08-20 06:07:55', 1, NULL, NULL),
(142, '_zip_code', 'รหัสไปรษณีย์', 'รหัสไปรษณีย์', 'ZIP code', 'O', 'O', '2016-08-20 06:09:16', 1, NULL, NULL),
(143, '_zipcode_find', 'ใส่รหัสไปรษณีย์เพื่อค้นหาที่อยู่', 'ใส่รหัสไปรษณีย์เพื่อค้นหาที่อยู่', 'Enter zip code to find the address.', 'O', 'O', '2016-08-20 06:16:09', 1, NULL, NULL),
(144, '_provice', 'จังหวัด', 'จังหวัด', 'Provice', 'O', 'O', '2016-08-20 06:22:41', 1, NULL, NULL),
(145, '_amphures', 'อำเภอ/เขต', 'อำเภอ/เขต', 'Amphure', 'O', 'O', '2016-08-20 06:23:48', 1, '2016-08-20 06:25:36', 1),
(146, '_district', 'ตำบล/แขวง', 'ตำบล/แขวง', 'District', 'O', 'O', '2016-08-20 06:24:57', 1, NULL, NULL),
(147, '_choose', 'เลือก', 'เลือก', 'Choose', 'O', 'O', '2016-08-20 08:51:47', 1, NULL, NULL),
(148, '_not_found_zip', 'ไม่พบรหัสไปรษณีย์นี้', 'ไม่พบรหัสไปรษณีย์นี้', 'Not found zip code these', 'O', 'O', '2016-08-20 09:02:44', 1, NULL, NULL),
(149, '_bank_transfer', 'โอนเงินผ่านธนาคาร', 'โอนเงินผ่านธนาคาร', 'Bank Transfer', 'O', 'O', '2016-08-21 02:02:13', 1, NULL, NULL),
(150, '_alert_notfound', 'คุณไม่มีรายการสินค้าในรถเข็น', 'คุณไม่มีรายการสินค้าในรถเข็น', 'You have no items in the basket', 'O', 'O', '2016-08-22 11:13:12', 1, '2016-08-22 11:16:36', 1),
(151, '_head_faq', 'คำถามที่พบบ่อย', 'คำถามที่พบบ่อย', 'Frequently asked questions', 'O', 'O', '2016-08-23 09:52:41', 1, NULL, NULL),
(152, '_desc_faq', 'คุณอยากรู้เกี่ยวกับอะไร? คุณมีปัญหากับผลิตภัณฑ์บางชนิดของของเราหรือไม่', 'คุณอยากรู้เกี่ยวกับอะไร? คุณมีปัญหากับผลิตภัณฑ์บางชนิดของของเราหรือไม่', 'Are you curious about something? Do you have some kind of problem with our products?', 'O', 'O', '2016-08-23 09:54:26', 1, NULL, NULL),
(153, '_desc_faq_1', 'โปรดอย่าลังเลที่จะติดต่อเราศูนย์บริการลูกค้าของเราจะทำงานให้คุณ 24/7', 'โปรดอย่าลังเลที่จะติดต่อเราศูนย์บริการลูกค้าของเราจะทำงานให้คุณ 24/7', 'Please feel free to contact us, our customer service center is working for you 24/7.', 'O', 'O', '2016-08-23 09:55:40', 1, NULL, NULL),
(154, '_alert_limit_product', 'ไม่สามารถทำรายการสังซื้อได้ กรุณาตรวจสอบจำนวนสินค้า', 'ไม่สามารถทำรายการสังซื้อได้ กรุณาตรวจสอบจำนวนสินค้า', 'Can\'t processing this Order all. Please check the number of products', 'O', 'O', '2016-08-30 09:36:21', 1, NULL, NULL),
(155, '_pass_old_not_match', 'รหัสผ่านเก่าไม่ถูกต้อง', 'รหัสผ่านเก่าไม่ถูกต้อง', 'Password old not match.', 'O', 'O', '2016-08-30 12:37:07', 1, NULL, NULL),
(156, '_pass_do_not_match', 'รหัสผ่านไม่ตรงกัน', 'รหัสผ่านไม่ตรงกัน', 'Passwords do not match', 'O', 'O', '2016-08-30 12:59:56', 1, NULL, NULL),
(157, '_pls_try_agian', 'กรุณาลองใหม่', ', กรุณาลองใหม่...', ', Please try again...', 'O', 'O', '2016-08-30 13:02:44', 1, NULL, NULL),
(158, '_orders', 'รายการสั่งซื้อ', 'รายการสั่งซื้อ', 'Orders', 'O', 'O', '2016-08-30 14:07:05', 1, NULL, NULL),
(159, '_date', 'วันที่', 'วันที่', 'Date', 'O', 'O', '2016-08-30 14:07:51', 1, NULL, NULL),
(160, '_status', 'สถานะ', 'สถานะ', 'Status', 'O', 'O', '2016-08-30 14:08:50', 1, NULL, NULL),
(161, '_action', 'จัดการ', 'จัดการ', 'Action', 'O', 'O', '2016-08-30 14:09:13', 1, NULL, NULL),
(162, '_order_now', 'สั่งซื้อแล้ว', 'สั่งซื้อแล้ว', 'Order now', 'O', 'O', '2016-08-30 14:18:44', 1, NULL, NULL),
(163, '_pending', 'รอดำเนินการ', 'รอดำเนินการ', 'Pending', 'O', 'O', '2016-08-30 14:19:47', 1, NULL, NULL),
(164, '_already_paid', 'ชำระเงินแล้ว', 'ชำระเงินแล้ว', 'Already Paid', 'O', 'O', '2016-08-30 14:21:00', 1, NULL, NULL),
(165, '_shipping_now', 'กำลังจัดส่ง', 'กำลังจัดส่ง', 'Shipping Now', 'O', 'O', '2016-08-30 14:21:36', 1, NULL, NULL),
(166, '_finish', 'สำเร็จ', 'สำเร็จ', 'Finish', 'O', 'O', '2016-08-30 14:22:20', 1, NULL, NULL),
(167, '_canceled', 'ยกเลิก', 'ยกเลิก', 'Canceled', 'O', 'O', '2016-08-30 14:22:58', 1, NULL, NULL),
(168, '_was_placed_on', 'สร้างเมื่อ', 'สร้างเมื่อ', 'was placed on', 'O', 'O', '2016-08-30 15:59:47', 1, NULL, NULL),
(169, '_and_is_currently', 'และสถานะปัจจุบัน', 'และสถานะปัจจุบัน', 'and is currently', 'O', 'O', '2016-08-30 16:00:40', 1, NULL, NULL),
(170, '_if_contact1', 'หากคุณมีคำถามใด ๆ โปรดอย่าลังเลที่จะ', 'หากคุณมีคำถามใด ๆ โปรดอย่าลังเลที่จะ', 'If you have any questions, please feel free to', 'O', 'O', '2016-08-30 16:03:12', 1, '2016-08-30 16:05:36', 1),
(171, '_our_customer', 'ศูนย์บริการลูกค้าของเราจะทำงานให้คุณ 24/7', 'ศูนย์บริการลูกค้าของเราจะทำงานให้คุณ 24/7', 'our customer service center is working for you 24/7', 'O', 'O', '2016-08-30 16:04:37', 1, NULL, NULL),
(172, '_shipping_address', 'ที่อยู่จัดส่ง', 'ที่อยู่จัดส่ง', 'Shipping address', 'O', 'O', '2016-08-30 16:27:27', 1, NULL, NULL),
(173, '_invoice_address', 'ที่อยู่ใบแจ้งหนี้', 'ที่อยู่ใบแจ้งหนี้', 'Invoice address', 'O', 'O', '2016-08-30 16:36:50', 1, NULL, NULL),
(174, '_payment_v', 'แจ้งโอนเงิน', 'แจ้งโอนเงิน', 'Payment', 'O', 'O', '2016-08-30 16:42:26', 1, NULL, NULL),
(175, '_subject_s', 'เรื่อง', 'เรื่อง', 'Subject', 'C', 'O', '2016-09-02 10:33:54', 1, '2016-09-02 10:34:37', 1),
(176, '_search', 'ค้นหา', 'ค้นหา', 'Search', 'O', 'O', '2016-09-03 14:00:57', 1, NULL, NULL),
(177, '_no_coupon_code', 'ไม่พบรหัสคูปองนี้', 'ไม่พบรหัสคูปองนี้', 'Not found coupon code.', 'O', 'O', '2016-09-03 14:37:28', 1, NULL, NULL),
(178, '_coupon_expires', 'รหัสคูปองนี้ หมดอายุ', 'รหัสคูปองนี้ หมดอายุ', 'Coupon code is expires.', 'O', 'O', '2016-09-03 14:44:55', 1, NULL, NULL),
(179, '_time', 'เวลา', 'เวลา', 'Time', 'O', 'O', '2016-09-04 05:46:55', 1, NULL, NULL),
(180, '_slip_img', 'รูปภาพ Slip', 'รูปภาพ Slip', 'Slip image.', 'O', 'O', '2016-09-04 05:49:50', 1, NULL, NULL),
(181, '_save', 'บันทึก', 'บันทึก', 'Save', 'O', 'O', '2016-09-04 05:52:40', 1, NULL, NULL),
(182, '_coupon_limit', 'คูปองใช้หมดแล้ว', 'คูปองใช้หมดแล้ว', 'Coupon use limited.', 'O', 'O', '2016-09-09 08:05:29', 1, NULL, NULL),
(183, '_continue_less', 'คูปองน้อยกว่าราคารวม', 'คูปองน้อยกว่าราคารวม', 'Coupon to less total price.', 'O', 'O', '2016-09-09 08:16:12', 1, NULL, NULL),
(184, '_forgotpass', 'ลืมรหัสผ่าน', 'ลืมรหัสผ่าน', 'Forgot Password.', 'O', 'O', '2016-09-09 08:55:04', 1, NULL, NULL),
(185, '_send', 'ส่ง', 'ส่ง', 'Send', 'O', 'O', '2016-09-09 09:14:21', 1, NULL, NULL),
(186, '_alert_error_order', 'ทำรายการไม่สำเร็จ กรุณาลองใหม่...', 'ทำรายการไม่สำเร็จ กรุณาลองใหม่...', 'Can\'t send orders please try again..', 'O', 'O', '2016-09-10 02:23:20', 1, NULL, NULL),
(187, '_check_mail_you', 'ตรวจสอบอีเมล์ของคุณ...', 'ตรวจสอบอีเมล์ของคุณ...', 'Check you e-mail..', 'O', 'O', '2016-09-19 04:45:31', 1, NULL, NULL),
(188, '_suppen_mail', 'อีเมล์นี้ไม่สามารถใช้งานได้ กรุณา ติดต่อเรา', 'อีเมล์นี้ไม่สามารถใช้งานได้ กรุณา ติดต่อเรา', 'Can\'t use this e-mail ., Please Contact.', 'O', 'O', '2016-09-19 05:02:51', 1, NULL, NULL),
(189, '_token_mail_register', 'กรุณายืนยันการสมัครสมาชิก (ตรวจสอบ อีเมล์)', 'กรุณายืนยันการสมัครสมาชิก (ตรวจสอบ อีเมล์)', 'Please confirm a register (Check e-mail).', 'O', 'O', '2016-09-19 05:04:55', 1, NULL, NULL),
(190, '_canceled_auto', 'ยกเลิกโดยระบบ', 'ยกเลิกโดยระบบ', 'Cancel by System.', 'O', 'O', '2016-09-21 12:41:50', 1, NULL, NULL),
(191, '_canceled_auto', 'ยกเลิกโดยระบบ', 'ยกเลิกโดยระบบ', 'Cancel by System.', 'O', 'O', '2016-09-21 12:47:22', 1, NULL, NULL),
(192, '_product_hot', 'สินค้ายอดนิยม', 'สินค้ายอดนิยม', 'Hot Product', 'O', 'O', '2016-09-23 05:43:05', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_module`
--

CREATE TABLE `project_module` (
  `id` int(11) NOT NULL,
  `module_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `module_prefix` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `module_type` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S' COMMENT 'S=single,M=multi',
  `lang_key` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) NOT NULL,
  `status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `active_status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `create_dtm` datetime NOT NULL,
  `create_by` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `update_dtm` datetime NOT NULL,
  `update_by` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_module`
--

INSERT INTO `project_module` (`id`, `module_name`, `module_prefix`, `module_type`, `lang_key`, `sort`, `status`, `active_status`, `icon`, `create_dtm`, `create_by`, `update_dtm`, `update_by`) VALUES
(1, 'Dashboard', 'dashboard', 'S', '_dashboard_mn', 1, 'O', 'O', 'fa fa-tachometer', '2015-06-26 10:18:49', '', '0000-00-00 00:00:00', ''),
(2, 'Content Management', 'content', 'M', '_content_mn', 10, 'C', 'O', 'fa fa-tasks', '2015-06-26 10:18:49', '', '0000-00-00 00:00:00', ''),
(5, 'User/Employee', 'user', 'M', '_user_mn', 8, 'O', 'O', 'fa fa-male', '2015-07-02 14:53:00', '1', '0000-00-00 00:00:00', ''),
(9, 'Administrator', 'setting', 'M', '_setting_mn', 12, 'O', 'O', 'fa fa-wrench', '2015-08-04 11:49:22', '1', '0000-00-00 00:00:00', ''),
(14, 'Language Management', 'language', 'M', '_lang_mn', 11, 'C', 'O', 'fa fa-language', '2016-08-03 00:00:00', '1', '2016-08-03 00:00:00', '1'),
(16, 'News', 'news', 'M', '_ev_sm', 7, 'O', 'O', 'fa fa-pencil', '2016-08-06 00:00:00', '1', '2016-08-06 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_module_item`
--

CREATE TABLE `project_module_item` (
  `id` int(11) NOT NULL,
  `module_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `item_prefix` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lang_key` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sort` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `active_status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `create_dtm` datetime NOT NULL,
  `create_by` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `update_dtm` datetime NOT NULL,
  `update_by` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_module_item`
--

INSERT INTO `project_module_item` (`id`, `module_id`, `item_name`, `item_prefix`, `lang_key`, `sort`, `status`, `active_status`, `icon`, `create_dtm`, `create_by`, `update_dtm`, `update_by`) VALUES
(1, '2', 'Category List', 'category', '_category_smn', '1', 'C', 'C', 'fa fa-list', '2015-07-02 15:02:21', '1', '0000-00-00 00:00:00', ''),
(2, '5', 'User List', 'userlist', '_userlist_smn', '1', 'O', 'O', 'fa fa-list', '2015-07-06 14:32:39', '1', '0000-00-00 00:00:00', ''),
(3, '2', 'Content List', 'contentlist', '_content_smn', '2', 'O', 'O', '', '2015-07-19 21:07:12', '1', '0000-00-00 00:00:00', ''),
(6, '9', 'User Permission', 'permission', '_permission_smn', '1', 'O', 'O', '', '2015-08-04 11:53:06', '1', '0000-00-00 00:00:00', ''),
(11, '6', 'Category List', 'bannerfifth', '_bannerfifth_smn', '2', 'O', 'O', '', '2015-08-11 15:19:51', '1', '0000-00-00 00:00:00', ''),
(12, '6', 'Slide List', 'slidelist', '_slide_smn', '1', 'O', 'O', '', '2015-12-17 14:58:16', '1', '2015-12-17 14:58:19', '1'),
(13, '9', 'Master Data', 'masterdata', '_master_smn', '3', 'C', 'C', '', '2016-01-21 11:04:39', '1', '2016-01-21 11:04:39', '1'),
(15, '14', 'จัดการภาษา', 'configlang', '_configlang_mn', '1', 'O', 'O', '', '2016-08-03 00:00:00', '1', '2016-08-03 00:00:00', '1'),
(16, '14', 'รายการภาษา', 'listlang', '_listlang_mn', '2', 'O', 'O', '', '2016-08-03 00:00:00', '1', '2016-08-03 00:00:00', '1'),
(21, '9', 'FAQ', 'faqlist', '_st_faq_mn', '3', 'O', 'O', '', '2016-08-06 00:00:00', '1', '2016-08-06 00:00:00', '1'),
(23, '16', 'News', 'newslist', '_evl_msm', '3', 'O', 'O', '', '2016-08-06 00:00:00', '1', '2016-08-06 00:00:00', '1'),
(26, '16', 'Category', 'category', '_article_cate_smn', '1', 'O', 'O', '', '2016-08-14 23:57:16', '1', '2016-08-14 23:57:16', '1'),
(28, '9', 'Contact Form', 'contactform', '_sm_contactfrm_msm', '7', 'O', 'O', '', '2016-09-11 00:00:00', '1', '2016-09-11 00:00:00', '1'),
(61, '16', 'Writer', 'writer', '_writer', '2', 'O', 'O', '', '2018-03-11 00:00:00', '1', '2018-09-11 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_role`
--

CREATE TABLE `project_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email_notification` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'D',
  `email_account` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'D',
  `status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `active_status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `create_dtm` datetime NOT NULL,
  `create_by` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `update_dtm` datetime NOT NULL,
  `update_by` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_role`
--

INSERT INTO `project_role` (`id`, `role_name`, `email_notification`, `email_account`, `status`, `active_status`, `create_dtm`, `create_by`, `update_dtm`, `update_by`) VALUES
(1, 'Administrator', 'A', 'D', 'O', '', '2015-08-05 11:22:25', '1', '2020-02-27 17:18:28', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_role_item`
--

CREATE TABLE `project_role_item` (
  `id` int(11) NOT NULL,
  `role_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `per_view` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `per_edit` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `per_delete` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_role_item`
--

INSERT INTO `project_role_item` (`id`, `role_id`, `item_id`, `permission`, `per_view`, `per_edit`, `per_delete`) VALUES
(569, '4', '1', 'D', 'D', 'D', 'D'),
(570, '4', '2', 'D', 'D', 'D', 'D'),
(571, '4', '9', 'D', 'D', 'D', 'D'),
(572, '4', '4', 'D', 'D', 'D', 'D'),
(573, '4', '5', 'D', 'D', 'D', 'D'),
(574, '4', '7', 'D', 'D', 'D', 'D'),
(575, '4', '8', 'D', 'D', 'D', 'D'),
(576, '4', '6', 'D', 'D', 'D', 'D'),
(577, '4', '10', 'D', 'D', 'D', 'D'),
(596, '5', '1', 'D', 'D', 'D', 'D'),
(597, '5', '2', 'D', 'D', 'D', 'D'),
(598, '5', '9', 'D', 'D', 'D', 'D'),
(599, '5', '4', 'D', 'D', 'D', 'D'),
(600, '5', '5', 'D', 'D', 'D', 'D'),
(601, '5', '7', 'D', 'D', 'D', 'D'),
(602, '5', '8', 'D', 'D', 'D', 'D'),
(603, '5', '6', 'D', 'D', 'D', 'D'),
(604, '5', '10', 'D', 'D', 'D', 'D'),
(605, '6', '1', 'D', 'D', 'D', 'D'),
(606, '6', '2', 'D', 'D', 'D', 'D'),
(607, '6', '9', 'D', 'D', 'D', 'D'),
(608, '6', '4', 'D', 'D', 'D', 'D'),
(609, '6', '5', 'D', 'D', 'D', 'D'),
(610, '6', '7', 'D', 'D', 'D', 'D'),
(611, '6', '8', 'D', 'D', 'D', 'D'),
(612, '6', '6', 'D', 'D', 'D', 'D'),
(613, '6', '10', 'D', 'D', 'D', 'D'),
(614, '7', '1', 'D', 'D', 'D', 'D'),
(615, '7', '2', 'D', 'D', 'D', 'D'),
(616, '7', '9', 'D', 'D', 'D', 'D'),
(617, '7', '4', 'D', 'D', 'D', 'D'),
(618, '7', '5', 'D', 'D', 'D', 'D'),
(619, '7', '7', 'D', 'D', 'D', 'D'),
(620, '7', '8', 'D', 'D', 'D', 'D'),
(621, '7', '6', 'D', 'D', 'D', 'D'),
(622, '7', '10', 'D', 'D', 'D', 'D'),
(623, '8', '1', 'D', 'D', 'D', 'D'),
(624, '8', '2', 'D', 'D', 'D', 'D'),
(625, '8', '9', 'D', 'D', 'D', 'D'),
(626, '8', '4', 'D', 'D', 'D', 'D'),
(627, '8', '5', 'D', 'D', 'D', 'D'),
(628, '8', '7', 'D', 'D', 'D', 'D'),
(629, '8', '8', 'D', 'D', 'D', 'D'),
(630, '8', '6', 'D', 'D', 'D', 'D'),
(631, '8', '10', 'D', 'D', 'D', 'D'),
(632, '9', '1', 'D', 'D', 'D', 'D'),
(633, '9', '2', 'D', 'D', 'D', 'D'),
(634, '9', '9', 'D', 'D', 'D', 'D'),
(635, '9', '4', 'D', 'D', 'D', 'D'),
(636, '9', '5', 'D', 'D', 'D', 'D'),
(637, '9', '7', 'D', 'D', 'D', 'D'),
(638, '9', '8', 'D', 'D', 'D', 'D'),
(639, '9', '6', 'D', 'D', 'D', 'D'),
(640, '9', '10', 'D', 'D', 'D', 'D'),
(641, '10', '1', 'D', 'D', 'D', 'D'),
(642, '10', '2', 'D', 'D', 'D', 'D'),
(643, '10', '9', 'D', 'D', 'D', 'D'),
(644, '10', '4', 'D', 'D', 'D', 'D'),
(645, '10', '5', 'D', 'D', 'D', 'D'),
(646, '10', '7', 'D', 'D', 'D', 'D'),
(647, '10', '8', 'D', 'D', 'D', 'D'),
(648, '10', '6', 'D', 'D', 'D', 'D'),
(649, '10', '10', 'D', 'D', 'D', 'D'),
(650, '11', '1', 'D', 'D', 'D', 'D'),
(651, '11', '2', 'D', 'D', 'D', 'D'),
(652, '11', '9', 'D', 'D', 'D', 'D'),
(653, '11', '4', 'D', 'D', 'D', 'D'),
(654, '11', '5', 'D', 'D', 'D', 'D'),
(655, '11', '7', 'D', 'D', 'D', 'D'),
(656, '11', '8', 'D', 'D', 'D', 'D'),
(657, '11', '6', 'D', 'D', 'D', 'D'),
(658, '11', '10', 'D', 'D', 'D', 'D'),
(659, '12', '1', 'D', 'D', 'D', 'D'),
(660, '12', '2', 'D', 'D', 'D', 'D'),
(661, '12', '9', 'D', 'D', 'D', 'D'),
(662, '12', '4', 'D', 'D', 'D', 'D'),
(663, '12', '5', 'D', 'D', 'D', 'D'),
(664, '12', '7', 'D', 'D', 'D', 'D'),
(665, '12', '8', 'D', 'D', 'D', 'D'),
(666, '12', '6', 'D', 'D', 'D', 'D'),
(667, '12', '10', 'D', 'D', 'D', 'D'),
(831, '3', '1', 'D', 'D', 'D', 'D'),
(832, '3', '3', 'D', 'D', 'D', 'D'),
(833, '3', '4', 'D', 'D', 'D', 'D'),
(834, '3', '5', 'D', 'D', 'D', 'D'),
(835, '3', '12', 'D', 'D', 'D', 'D'),
(836, '3', '2', 'D', 'D', 'D', 'D'),
(837, '3', '6', 'D', 'D', 'D', 'D'),
(1387, '2', '12', 'A', 'A', 'A', 'A'),
(1388, '2', '11', 'A', 'A', 'A', 'A'),
(1389, '2', '23', 'A', 'A', 'A', 'A'),
(1390, '2', '26', 'D', 'D', 'D', 'D'),
(1391, '2', '31', 'A', 'A', 'A', 'A'),
(1392, '2', '32', 'A', 'A', 'A', 'A'),
(1393, '2', '33', 'A', 'A', 'A', 'A'),
(1394, '2', '34', 'A', 'A', 'A', 'A'),
(1395, '2', '22', 'A', 'A', 'A', 'A'),
(1396, '2', '24', 'D', 'D', 'D', 'D'),
(1397, '2', '2', 'D', 'D', 'D', 'D'),
(1398, '2', '4', 'D', 'D', 'D', 'D'),
(1399, '2', '5', 'D', 'D', 'D', 'D'),
(1400, '2', '9', 'D', 'D', 'D', 'D'),
(1401, '2', '30', 'D', 'D', 'D', 'D'),
(1402, '2', '3', 'A', 'A', 'A', 'A'),
(1403, '2', '25', 'D', 'D', 'D', 'D'),
(1404, '2', '15', 'A', 'A', 'A', 'A'),
(1405, '2', '16', 'A', 'A', 'A', 'A'),
(1406, '2', '6', 'D', 'D', 'D', 'D'),
(1407, '2', '17', 'A', 'A', 'A', 'A'),
(1408, '2', '18', 'D', 'D', 'D', 'D'),
(1409, '2', '21', 'D', 'D', 'D', 'D'),
(1410, '2', '19', 'D', 'D', 'D', 'D'),
(1411, '2', '27', 'D', 'D', 'D', 'D'),
(1412, '2', '20', 'D', 'D', 'D', 'D'),
(1413, '2', '29', 'D', 'D', 'D', 'D'),
(1414, '2', '28', 'A', 'A', 'A', 'A'),
(3172, '1', '26', 'A', 'A', 'A', 'A'),
(3173, '1', '61', 'A', 'A', 'A', 'A'),
(3174, '1', '23', 'A', 'A', 'A', 'A'),
(3175, '1', '2', 'A', 'A', 'A', 'A'),
(3176, '1', '6', 'A', 'A', 'A', 'A'),
(3177, '1', '21', 'D', 'D', 'D', 'D'),
(3178, '1', '28', 'D', 'D', 'D', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `project_role_module`
--

CREATE TABLE `project_role_module` (
  `id` int(11) NOT NULL,
  `role_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `module_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT 'O=open,C=Close',
  `per_view` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `per_edit` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `per_delete` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_role_module`
--

INSERT INTO `project_role_module` (`id`, `role_id`, `module_id`, `permission`, `per_view`, `per_edit`, `per_delete`) VALUES
(1247, '2', '14', 'A', 'D', 'D', 'D'),
(1246, '2', '18', 'D', 'D', 'D', 'D'),
(920, '3', '9', 'D', 'D', 'D', 'D'),
(919, '3', '5', 'D', 'D', 'D', 'D'),
(918, '3', '6', 'D', 'D', 'D', 'D'),
(917, '3', '3', 'D', 'D', 'D', 'D'),
(916, '3', '2', 'D', 'D', 'D', 'D'),
(915, '3', '1', 'D', 'D', 'D', 'D'),
(683, '4', '9', 'D', 'D', 'D', 'D'),
(682, '4', '8', 'D', 'D', 'D', 'D'),
(681, '4', '7', 'D', 'D', 'D', 'D'),
(680, '4', '6', 'D', 'D', 'D', 'D'),
(679, '4', '5', 'D', 'D', 'D', 'D'),
(678, '4', '4', 'D', 'D', 'D', 'D'),
(677, '4', '3', 'D', 'D', 'D', 'D'),
(676, '4', '2', 'D', 'D', 'D', 'D'),
(675, '4', '1', 'D', 'D', 'D', 'D'),
(702, '5', '1', 'D', 'D', 'D', 'D'),
(703, '5', '2', 'D', 'D', 'D', 'D'),
(704, '5', '3', 'D', 'D', 'D', 'D'),
(705, '5', '4', 'D', 'D', 'D', 'D'),
(706, '5', '5', 'D', 'D', 'D', 'D'),
(707, '5', '6', 'D', 'D', 'D', 'D'),
(708, '5', '7', 'D', 'D', 'D', 'D'),
(709, '5', '8', 'D', 'D', 'D', 'D'),
(710, '5', '9', 'D', 'D', 'D', 'D'),
(711, '6', '1', 'D', 'D', 'D', 'D'),
(712, '6', '2', 'D', 'D', 'D', 'D'),
(713, '6', '3', 'D', 'D', 'D', 'D'),
(714, '6', '4', 'D', 'D', 'D', 'D'),
(715, '6', '5', 'D', 'D', 'D', 'D'),
(716, '6', '6', 'D', 'D', 'D', 'D'),
(717, '6', '7', 'D', 'D', 'D', 'D'),
(718, '6', '8', 'D', 'D', 'D', 'D'),
(719, '6', '9', 'D', 'D', 'D', 'D'),
(720, '7', '1', 'D', 'D', 'D', 'D'),
(721, '7', '2', 'D', 'D', 'D', 'D'),
(722, '7', '3', 'D', 'D', 'D', 'D'),
(723, '7', '4', 'D', 'D', 'D', 'D'),
(724, '7', '5', 'D', 'D', 'D', 'D'),
(725, '7', '6', 'D', 'D', 'D', 'D'),
(726, '7', '7', 'D', 'D', 'D', 'D'),
(727, '7', '8', 'D', 'D', 'D', 'D'),
(728, '7', '9', 'D', 'D', 'D', 'D'),
(729, '8', '1', 'D', 'D', 'D', 'D'),
(730, '8', '2', 'D', 'D', 'D', 'D'),
(731, '8', '3', 'D', 'D', 'D', 'D'),
(732, '8', '4', 'D', 'D', 'D', 'D'),
(733, '8', '5', 'D', 'D', 'D', 'D'),
(734, '8', '6', 'D', 'D', 'D', 'D'),
(735, '8', '7', 'D', 'D', 'D', 'D'),
(736, '8', '8', 'D', 'D', 'D', 'D'),
(737, '8', '9', 'D', 'D', 'D', 'D'),
(738, '9', '1', 'D', 'D', 'D', 'D'),
(739, '9', '2', 'D', 'D', 'D', 'D'),
(740, '9', '3', 'D', 'D', 'D', 'D'),
(741, '9', '4', 'D', 'D', 'D', 'D'),
(742, '9', '5', 'D', 'D', 'D', 'D'),
(743, '9', '6', 'D', 'D', 'D', 'D'),
(744, '9', '7', 'D', 'D', 'D', 'D'),
(745, '9', '8', 'D', 'D', 'D', 'D'),
(746, '9', '9', 'D', 'D', 'D', 'D'),
(747, '10', '1', 'D', 'D', 'D', 'D'),
(748, '10', '2', 'D', 'D', 'D', 'D'),
(749, '10', '3', 'D', 'D', 'D', 'D'),
(750, '10', '4', 'D', 'D', 'D', 'D'),
(751, '10', '5', 'D', 'D', 'D', 'D'),
(752, '10', '6', 'D', 'D', 'D', 'D'),
(753, '10', '7', 'D', 'D', 'D', 'D'),
(754, '10', '8', 'D', 'D', 'D', 'D'),
(755, '10', '9', 'D', 'D', 'D', 'D'),
(756, '11', '1', 'D', 'D', 'D', 'D'),
(757, '11', '2', 'D', 'D', 'D', 'D'),
(758, '11', '3', 'D', 'D', 'D', 'D'),
(759, '11', '4', 'D', 'D', 'D', 'D'),
(760, '11', '5', 'D', 'D', 'D', 'D'),
(761, '11', '6', 'D', 'D', 'D', 'D'),
(762, '11', '7', 'D', 'D', 'D', 'D'),
(763, '11', '8', 'D', 'D', 'D', 'D'),
(764, '11', '9', 'D', 'D', 'D', 'D'),
(765, '12', '1', 'D', 'D', 'D', 'D'),
(766, '12', '2', 'D', 'D', 'D', 'D'),
(767, '12', '3', 'D', 'D', 'D', 'D'),
(768, '12', '4', 'D', 'D', 'D', 'D'),
(769, '12', '5', 'D', 'D', 'D', 'D'),
(770, '12', '6', 'D', 'D', 'D', 'D'),
(771, '12', '7', 'D', 'D', 'D', 'D'),
(772, '12', '8', 'D', 'D', 'D', 'D'),
(773, '12', '9', 'D', 'D', 'D', 'D'),
(1245, '2', '2', 'A', 'D', 'D', 'D'),
(1244, '2', '7', 'D', 'D', 'D', 'D'),
(1243, '2', '3', 'D', 'D', 'D', 'D'),
(1242, '2', '5', 'D', 'D', 'D', 'D'),
(1241, '2', '17', 'D', 'D', 'D', 'D'),
(1240, '2', '15', 'A', 'D', 'D', 'D'),
(1239, '2', '16', 'A', 'D', 'D', 'D'),
(1238, '2', '6', 'A', 'D', 'D', 'D'),
(1237, '2', '1', 'A', 'A', 'A', 'A'),
(1248, '2', '9', 'A', 'D', 'D', 'D'),
(2009, '1', '9', 'D', 'D', 'D', 'D'),
(2008, '1', '5', 'D', 'D', 'D', 'D'),
(2007, '1', '16', 'A', 'D', 'D', 'D'),
(2006, '1', '1', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `id` int(11) NOT NULL,
  `user_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_nickname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_thumb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_start_date` date NOT NULL,
  `user_phone_number` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `personal_leave` int(11) NOT NULL DEFAULT '0',
  `sick_leave` int(11) NOT NULL DEFAULT '0',
  `vacation_leave` int(11) NOT NULL DEFAULT '0',
  `user_theme` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'skin-yellow',
  `status` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT 'P=probation,E=permanent,O=other',
  `other_status` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `active_status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `user_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_token_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_dtm` datetime NOT NULL,
  `create_by` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `update_dtm` datetime DEFAULT NULL,
  `update_by` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_address` text COLLATE utf8_unicode_ci NOT NULL,
  `user_alley` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_zipcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_province_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_amphure_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_district_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `user_username`, `user_email`, `user_password`, `user_name`, `user_nickname`, `user_thumb`, `position_id`, `user_birthdate`, `user_start_date`, `user_phone_number`, `user_role_id`, `personal_leave`, `sick_leave`, `vacation_leave`, `user_theme`, `status`, `other_status`, `active_status`, `user_token`, `user_token_mail`, `create_dtm`, `create_by`, `update_dtm`, `update_by`, `user_address`, `user_alley`, `user_street`, `user_zipcode`, `user_province_id`, `user_amphure_id`, `user_district_id`) VALUES
(1, 'admin', 'admin@admin.com', '098f6bcd4621d373cade4e832627b4f6', 'Admin', 'Admin', 'default.jpg', '', '2015-12-30', '2015-12-29', '0980822838', '1', 0, 0, 0, 'skin-blue', 'O', '', 'O', 'xPOliYHjWhLEqsVe6QBnUdKaD', '', '2015-12-29 11:28:03', '1', '2017-07-15 21:28:49', '1', '', '', '', '', '', '', ''),
(33, 'admin@admin', 'admin@admin.com', '098f6bcd4621d373cade4e832627b4f6', 'Adminitrator', '', 'default.jpg', '', '2016-09-20', '0000-00-00', '020385592', '1', 0, 0, 0, 'skin-blue', 'C', '', 'O', '', '', '2016-09-20 00:10:41', '', '2020-02-20 20:55:19', NULL, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `project_user_log`
--

CREATE TABLE `project_user_log` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `event_type` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT '1=login,2=logout,3module',
  `module_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ipaddress` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `extra` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `create_dtm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_user_log`
--

INSERT INTO `project_user_log` (`id`, `user_id`, `token`, `event_type`, `module_id`, `ipaddress`, `extra`, `create_dtm`) VALUES
(1, '1', 'C5yiSkMocjLX9wJbtAz2epDYW', '1', '0', '127.0.0.1', 'Success', '2020-02-18 20:11:43'),
(2, '1', 'R86AjdVXB7NKqn94ioktY1f5Z', '1', '0', '127.0.0.1', 'Success', '2020-02-20 20:12:26'),
(3, '1', 'vuIYDh4LN6w0dXGJrVfqAcpxF', '1', '0', '127.0.0.1', 'Success', '2020-02-23 08:37:19'),
(4, '1', 'PuJ31E4vK2iGFhdlTotbHYB5c', '1', '0', '127.0.0.1', 'Success', '2020-02-24 15:19:58'),
(5, '1', 'B7J0uLa8NUAsZzoH4IT9dln2k', '1', '0', '127.0.0.1', 'Success', '2020-02-27 09:10:46'),
(6, '1', 'MlY2Vmtp73NaeWXFzxuiwrkIS', '1', '0', '183.89.153.18', 'Success', '2020-02-27 17:04:45'),
(7, '1', '0', '2', '0', '183.89.153.18', 'Success', '2020-02-28 09:11:48'),
(8, '1', 'rLjf6X8wsa2kudN3nKDyxYSz0', '1', '0', '183.89.153.18', 'Success', '2020-02-28 09:11:50'),
(9, '1', '0', '2', '0', '183.89.153.18', 'Success', '2020-02-28 09:12:02'),
(10, '1', '2Pom85TxrYMRCB4nzUlFVZHWy', '1', '0', '183.89.153.18', 'Success', '2020-02-28 09:12:08'),
(11, '1', 'zS749qJBTrCskPyXEnt5mu8Rx', '1', '0', '183.89.153.18', 'Success', '2020-02-28 10:00:48'),
(12, '1', 'Mnyg6uE52TZ1Dt9SiWXwcmQ0Y', '1', '0', '101.51.77.159', 'Success', '2020-02-28 10:48:00'),
(13, '1', 'BT6tFgN8d2lILpjkeRyJSvnPa', '1', '0', '183.89.153.18', 'Success', '2020-02-28 14:21:13'),
(14, '1', 'JL4XwpfNrVhI9A5Hv3d0gE62Y', '1', '0', '58.11.189.96', 'Success', '2020-03-27 20:49:31'),
(15, '1', '0', '1', '0', '58.11.156.253', 'Wrong Password', '2020-04-03 20:36:09'),
(16, '1', 'RfcIhtuLPV3mQxaXH2lWdBeCO', '1', '0', '58.11.156.253', 'Success', '2020-04-03 20:36:13'),
(17, '1', 'sHNh7fLQbneorj914diOt0YDg', '1', '0', '58.11.189.81', 'Success', '2020-04-06 09:30:25'),
(18, '1', '3W5ZrSwj7sAPfnx2m84VaDyvq', '1', '0', '115.87.153.159', 'Success', '2020-04-10 10:08:40'),
(19, '1', 'xPOliYHjWhLEqsVe6QBnUdKaD', '1', '0', '180.183.97.112', 'Success', '2020-04-10 16:45:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_article`
--
ALTER TABLE `project_article`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `writer_id` (`writer_id`);

--
-- Indexes for table `project_article_category`
--
ALTER TABLE `project_article_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `project_article_writer`
--
ALTER TABLE `project_article_writer`
  ADD PRIMARY KEY (`writer_id`);

--
-- Indexes for table `project_content`
--
ALTER TABLE `project_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `project_language`
--
ALTER TABLE `project_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_language_layout`
--
ALTER TABLE `project_language_layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_module`
--
ALTER TABLE `project_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_module_item`
--
ALTER TABLE `project_module_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_role`
--
ALTER TABLE `project_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_role_item`
--
ALTER TABLE `project_role_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_role_module`
--
ALTER TABLE `project_role_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_user_log`
--
ALTER TABLE `project_user_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_article`
--
ALTER TABLE `project_article`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_article_category`
--
ALTER TABLE `project_article_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_article_writer`
--
ALTER TABLE `project_article_writer`
  MODIFY `writer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_content`
--
ALTER TABLE `project_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_language`
--
ALTER TABLE `project_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_language_layout`
--
ALTER TABLE `project_language_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `project_module`
--
ALTER TABLE `project_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project_module_item`
--
ALTER TABLE `project_module_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `project_role`
--
ALTER TABLE `project_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_role_item`
--
ALTER TABLE `project_role_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3179;

--
-- AUTO_INCREMENT for table `project_role_module`
--
ALTER TABLE `project_role_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2010;

--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `project_user_log`
--
ALTER TABLE `project_user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
