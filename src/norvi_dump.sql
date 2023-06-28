--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.12
-- Dumped by pg_dump version 9.5.12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: images; Type: TABLE; Schema: public; Owner: fhs44559
--
CREATE TABLE public.images (
    image_id integer NOT NULL,
    image_title character varying(256),
    file_name character varying(256) NOT NULL,
    image_owner character varying(256),
    nd_filter_used character varying(256) NOT NULL,
    cpol_used character varying(256) NOT NULL,
    motive_coordinates character varying(256) NOT NULL,
    creator_coordinates character varying(256) NOT NULL,
    recommended_weather character varying(256) NOT NULL,
    additional_information character varying(512) NOT NULL,
    location_type character varying(512) NOT NULL,
    uploaded_at timestamp without time zone DEFAULT now()
);


ALTER TABLE public.images OWNER TO fhs44559;

--
-- Name: images_image_id_seq; Type: SEQUENCE; Schema: public; Owner: 
fhs44559
--

CREATE SEQUENCE public.images_image_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
ALTER TABLE public.images_image_id_seq OWNER TO fhs44559;

--
-- Name: images_image_id_seq; Type: SEQUENCE OWNED BY; Schema: 
public; Owner: fhs44559
--

ALTER SEQUENCE public.images_image_id_seq OWNED BY 
public.images.image_id;


--
-- Name: likes; Type: TABLE; Schema: public; Owner: fhs44559
--

CREATE TABLE public.likes (
    fk_image_id integer,
    fk_image_owner character varying(256)
);


ALTER TABLE public.likes OWNER TO fhs44559;

--
-- Name: users; Type: TABLE; Schema: public; Owner: fhs44559
--

CREATE TABLE public.users (
    user_id integer NOT NULL,
    username character varying(25) NOT NULL,
    name character varying(25) NOT NULL,
    email character varying(320) NOT NULL,
    password character varying(256) NOT NULL,
    vkey character varying(256) NOT NULL,
    verified boolean DEFAULT false,
    created_at timestamp without time zone DEFAULT now(),
    updated_at timestamp without time zone DEFAULT now()
);

ALTER TABLE public.users OWNER TO fhs44559;

--
-- Name: users_user_id_seq; Type: SEQUENCE; Schema: public; Owner: 
fhs44559
--

CREATE SEQUENCE public.users_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_user_id_seq OWNER TO fhs44559;

--
-- Name: users_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; 
Owner: fhs44559
--

ALTER SEQUENCE public.users_user_id_seq OWNED BY 
public.users.user_id;


--
-- Name: image_id; Type: DEFAULT; Schema: public; Owner: fhs44559
--

ALTER TABLE ONLY public.images ALTER COLUMN image_id SET DEFAULT 
nextval('public.images_image_id_seq'::regclass);


--
-- Name: user_id; Type: DEFAULT; Schema: public; Owner: fhs44559
--

ALTER TABLE ONLY public.users ALTER COLUMN user_id SET DEFAULT 
nextval('public.users_user_id_seq'::regclass);

--
-- Data for Name: images; Type: TABLE DATA; Schema: public; Owner: 
fhs44559
--

COPY public.images (image_id, image_title, file_name, image_owner, 
nd_filter_used, cpol_used, motive_coordinates, creator_coordinates, 
recommended_weather, additional_information, location_type, 
uploaded_at) FROM stdin;
1       Lofot Fjord     P7190010-HDR.jpg        xkonstix        no      
no      67.91899730900535,13.048473527453519    
67.91301791547257,13.075108132111831    Cloudy  You can park right 
next to the street   Landscape       2022-05-30 21:56:21.985203
2       Lackenkogel     P5270151.JPG            nö      no      
47.32627707909451,13.42330297199726     
47.32535381976828,13.42349861089726     Sonnenaufgang   hei du ei       
Mountain        2022-05-31 20:19:01.136542
3       Andenes Seascape        P7220207.jpg    xkonstix        ND 
1000 no      69.29856371167514,15.990588680249667    
69.29813611811907,15.990542564156522    Sunset  Parking possible next 
to street Seascape        2022-06-01 00:45:16.134075
4       Puffin  puffin.jpg      xkonstix        No      no      
62.400882462802045,5.601172908604359    
62.40104173419067,5.6025666829847065    Sunset  The puffins in Runde 
will come very close to you in the evening. Breeding season is from 
May to beginning of may.       Wildlife        2022-06-01 
00:52:57.445568
5       Geiranger Fjord P7190806-Edit.jpg       xkonstix        no      
yes     62.106990, 7.094267     62.107405, 7.104585     Sunset or 
Cloudy        This photo was taken through the Geiranger Boat Tour    
Landscape       2022-06-01 01:35:22.347843
6       Preikestolen    P1033389-HDR-Edit.jpg   xkonstix        no      
yes     58.986333, 6.190245     58.986248, 6.185902     Sunrise, 
Sunset or Cloudy       Hiking up there will take around 2h depending 
on condition. Parking is 25 Euros here.   Epic    2022-06-01 
01:37:17.454208
7       Stave Church, Borgund   _1033738.jpg    xkonstix        No      
yes     61.047330, 7.812171     61.047453, 7.811512     Cloudy  You 
can go to the area for free, however if you want to go into the 
church entry fee is around 100 Nok. Viking  2022-06-01 
01:43:37.589509
8       Sotefossen      _8050750.jpg    xkonstix        ND1000  yes     
60.334733, 6.800308     60.339514, 6.799756     Cloudy or Sunset        
Hike is about 800m in Height to there.  Landscape       2022-06-01 
01:48:37.76904
9       Nyastølfossen   _8050754.jpg    xkonstix        ND1000  yes     
60.349457, 6.776027     60.351596, 6.773309     Cloudy or Sunset        
Halfway of the 4 Waterfalls Hike of Kinsarvik   Mountain        
2022-06-01 01:50:32.482327
11      Spanish Riding School   hofreit small.jpg       xkonstix        
No      no      48.207744873189895, 16.36619749174199   
48.2090816980487, 16.36802348982779     Sunset, Afternoon       
Walking recommended     Urban   2022-06-01 02:00:09.581511
12      Tram in Vienna  _DSC1568__.jpg  xkonstix        No      no      
48.20539151598698, 16.358322962652604   48.20582317080519, 
16.359212959809526   Sunset  Shot from the pedestrian's walk.        
Urban   2022-06-01 02:05:12.661842
13      Hallstatt       _DSC3577.jpg    xkonstix        No      no      
47.56217918656873, 13.649892361151856   47.564593957677836, 
13.64989025462357   Snowy   Parking is outside of the whole area, 
walking duration about 20min.     Urban   2022-06-01 02:06:35.277256
14      Sydney Opera Sunset     1. Australien (15).jpg  xkonstix        
ND1000  yes     -33.85747404748073, 151.21509386111956  
-33.85811683703843, 151.22881450133357  Sunset  Very Popular    Urban   
2022-06-01 02:16:03.992482
15      Grey Headed Flying Fox  1. Australien (19).jpg  xkonstix        
no      no      -33.80358448193814, 150.99889019789018  
-33.803944708197534, 150.99909842104643 Sunset  They will come in the 
evening, during the day, they only splash the water for cooling.  
Wildlife        2022-06-01 02:17:30.957853
16      Djavola Varos   3. Serbien (6).jpg      xkonstix        
ND1000  yes     43.010194806331775, 21.409148529356273  
43.00544063560859, 21.41079258346866    Any     Usually not crowded     
Mountain        2022-06-01 02:19:14.359061
17      Sakrisøya       city_thumbnail.jpg      xkonstix        
ND1000  no      67.94110001025054, 13.11285884493538    
67.9409306146349, 13.11550911635829     Sunset  Parking in the area 
is tricky, better come by foot.     Urban   2022-06-01 
02:20:22.677231
18      Rubjerg Knude Fyr       lighthouse denmark.jpg  xkonstix        
no      yes     57.448985520273055, 9.775480993289051   
57.44799258716084, 9.77706880624346     Stormy  Very sandy ;)   Urban   
2022-06-01 02:30:49.376438
19      Gate of Mumbai  P1010009.jpg    xkonstix        No      no      
18.92200380017111, 72.83456122586986    18.922542825311908, 
72.8343120961119    All     Security check at entry Urban   
2022-06-01 02:32:08.37954
20      Chhatrapati Shivaji     P1010072.jpg    xkonstix        No      
no      18.939773312309978, 72.8352950380491    18.939674672744747, 
72.83456187041159   All     Very crowded    Urban   2022-06-01 
02:36:13.69517
21      Monkey at Elephanta Caves       P1010121.jpg    xkonstix        
No      no      18.96354301835813, 72.93143847428094    
18.963866127227913, 72.93141909405398   All     Watch out for the 
greedy monkeys!       Wildlife        2022-06-01 02:37:40.452466
22      Mostar Bridge   P1011403.jpg    xkonstix        No      yes     
43.33731975362681, 17.814943241974436   43.33666656176248, 
17.814880925148522   Sunset  Very beautiful, enjoy a nice and cheap 
meal after sunset nearby :)      Urban   2022-06-01 02:39:10.109286
23      Lady of the Rocks       P1022373.jpg    xkonstix        no      
no      42.48668643457663, 18.68876019123339    42.48640307403114, 
18.68913689941257    All     You need to take a boat...      Urban   
2022-06-01 02:40:05.559801
24      Vennebjerg Mølle        P1033121.jpg    xkonstix        No      
no      57.45926907811465, 9.822545858608825    57.45774248633862, 
9.81957611364989     All     Just park next to the street... Urban   
2022-06-01 02:45:50.195421
25      Sverd i Fjell   P1033223-HDR-Edit.jpg   xkonstix        No      
yes     58.94136151312637, 5.671923877197408    58.94149790169862, 
5.671928828967741    Cloudy  Parking nearby possible.        Viking  
2022-06-01 02:46:56.146209
26      Opera of Sydney P3090009-Edit.jpg       xkonstix        
ND1000  yes     -33.857185878119566, 151.2152736215388  
-33.84928327873001, 151.21326240908107  Sunny   Nothing to say here..   
Urban   2022-06-01 02:48:01.407151
27      Sydney at Night P3090173.jpg    xkonstix        No      no      
-33.865483705609385, 151.21213671546067 -33.86740583177349, 
151.2174524725477   Night   Don´t drop anything     Urban   
2022-06-01 02:49:28.308138
28      Geiranger Fjord P7191070-HDR.jpg        xkonstix        no      
yes     62.10011802236665, 7.2038577247846      62.12604384769521, 
7.168036738937303    Sunset  Park on the Ørnesvingen Viewpoint       
Landscape       2022-06-01 02:51:03.713906
29      Huge Reindeer   P7240323.jpg    xkonstix        No      no      
70.62245486074684, 25.35114404057729    70.62286665516298, 
25.351936204156438   All     They all over the area, watch out they 
can get very big and dangerous!  Wildlife        2022-06-01 
02:53:16.246323
30      Boats in Alta   P7250130-HDR.jpg        xkonstix        No      
no      69.92891380502631, 23.271357557758478   69.92865570071122, 
23.273094711613595   Sunset  Maybe there are no boats no more... 
Picture was taken with HDR technique.       Seascape        
2022-06-01 02:54:53.938812
31      Light of the morning dawn       riverlight_small.jpg    
xkonstix        ND1000  yes     62.329078576474416, 7.4845180568358     
62.32935490053768, 7.482575496368232    Morning Park a little further 
down the street   Landscape       2022-06-01 02:59:21.901735
32      Stones in River ready2print.jpg xkonstix        ND1000  no      
62.405714452759355, 7.6289887883729115  62.40575426183441, 
7.628340940140194    Sunset / Midnight Sun   You will need rubbered 
boots    Landscape       2022-06-01 03:01:14.093617
33      Road to Heaven  roadtoheavensmaller.jpg xkonstix        no      
yes     69.28487483479283, 16.001194005750243   69.2771994239297, 
15.973954274532975    Cloudy  Panoramaphoto   Landscape       
2022-06-01 03:02:54.478005
34      Salzburg at night       Salzburg Cityscape at blue Hour.jpg     
xkonstix        no      no      47.79364921777476, 13.048261568648792   
47.802906467331155, 13.110080394252396  Night   Parking got tricky 
the last few years...        Urban   2022-06-01 03:04:35.605967
35      Uttakleiv Beach smol_1044950.jpg        xkonstix        
ND1000  no      68.24850033226794, 13.523454906560154   
68.21056735058949, 13.503066365552169   Sunset  Entry fee for a car 
is 50 kroners currently     Seascape        2022-06-01 
03:05:52.789096
36      Vågan Church    smol-2.jpg      xkonstix        NO      no      
68.21572184627234, 14.483478154478803   68.21584123279132, 
14.482689877042956   Cloudy  Parking possible right next to it.      
Urban   2022-06-01 03:07:31.449077
37      North Cape      smol.jpg        xkonstix        No      no      
71.17097049456636, 25.783219688333915   71.16985391825042, 
25.780899576942975   Cloudy  Entry fee for the area is 250 Kroners.  
Epic    2022-06-01 03:08:47.95735
38      Trollstigen     trollstigen smol.jpg    xkonstix        no      
no      62.4630556240431, 7.677471416400968     62.45526673927159, 
7.672608114123648    Cloudy, Sunset  Parking is free here    
Landscape       2022-06-01 03:11:49.495617
39      Sperm Whale     whale raw.jpg   xkonstix        No      no      
69.65732095773372, 15.948412500154324           69.6332764152254, 
15.92970952891233     Sunny, Sunset   Take the Sea Safari Andenes 
Speedboat tour to see whales in norway!     Wildlife        
2022-06-01 03:13:17.829812
40      Asbjørnsfossen  waterfall.jpg   xkonstix        ND1000  no      
62.270384013890386, 8.106945217828398   62.27014950320593, 
8.105976366014072    Cloudy  A very nice place to stay!      
Landscape       2022-06-01 03:21:34.097745
41      Salzburg        _DSC4336.jpg    xkonstix        No      no      
47.79522576569944, 13.047238984312175   47.80507613793519, 
13.037693237240546   Sunny   Coming by foot is recommended   Urban   
2022-06-01 03:26:25.15892
43      Gruppenfoto MMT IMG_6391.jpg    norvi   no      no      
47.72426436567725,13.085729471278375    
47.72438665026153,13.086020705364701    Egal    Egal    Epic    
2022-06-03 11:25:20.19959
45      Urstein Allee im Herbst urstein-im-herbst.png   bjelline        
none    no      47.72505174587802,13.086173362999196    
47.724877754848784,13.085530435987886   any     none    Landscape       
2022-06-13 13:46:21.625945
46      Ships in Halmstad       2013-08-14 17.15.10.jpg bjelline        
no      no      56.66509517112774,12.85787935170723     
56.66477215323269,12.856961506995315    sunny   none    Urban   
2022-10-16 12:31:54.527452
\.


--
-- Name: images_image_id_seq; Type: SEQUENCE SET; Schema: public; 
Owner: fhs44559
--

COPY public.likes (fk_image_id, fk_image_owner) FROM stdin;
4       xkonstix
23      xkonstix
33      testuser
3       xkonstix
39      xkonstix
30      xkonstix
29      xkonstix
37      xkonstix
25      xkonstix
9       xkonstix
7       xkonstix
18      xkonstix
24      xkonstix
13      xkonstix
36      xkonstix
35      xkonstix
4       norvi
28      norvi
2       norvi
28      xkonstix
40      bjelline
1       xkonstix
17      xkonstix
8       xkonstix
25      norvi
46      norvi
6       norvi
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: 
fhs44559
--

COPY public.users (user_id, username, name, email, password, vkey, 
verified, created_at, updated_at) FROM stdin;
1       xkonstix        Konsti K.       xkonstix@gmail.com      
$2y$10$DdUEHBvjtsQjtYNo/xbqHOZ0UCdhAxEWWpO8lg4zG49pGity/YyYK    
16c33520fbe4682c0d64c6b8d7f98716        t       2022-05-30 
21:47:42.68413       2022-05-30 21:47:42.68413
2               Marlene praeauer.marlene@gmail.com      
$2y$10$nqLIFulRX.wKRg8cJXqs6uk5YyFBS9a2Ily/uIucacsks7VEdwoIi    
4f11ef26ec510c5adfbb4831b99d7e35        t       2022-05-31 
20:09:44.111977      2022-05-31 20:09:44.111977
3       Pendejo69       BH      hofmannb11@gmail.com    
$2y$10$9ouPqnr0IP66hUro6ghmiu1fLOXmVobVXthzU3IF7.MBP16fi4Nku    
8485f7d57dafa55c869ab4aa0db2f91e        t       2022-05-31 
21:50:29.230374      2022-05-31 21:50:29.230374
5       testuser        test    konstantin.kowarsch@gmail.com   
$2y$10$7b7k7gkrUQDKPtyG0eiiQ.NoqxJXjBGCnAGpgdgcwq5hLyYaemAdC    
91676012ffd4fb3d8bd7d969fbcc61cf        t       2022-06-01 
10:23:37.781532      2022-06-01 10:23:37.781532
7       RiaK    Viktoria Kowarsch       
viktoria.kowarsch.99@gmail.com  
$2y$10$Ffnao70FK252uOxiw4ZHWOZATZ/F/CHIf35pvZCuXnBteuxNBsQyq    
16d4b47a1188cde5467d9c55a17129c1        t       2022-06-01 
14:25:34.992561      2022-06-01 14:25:34.992561
11      norvi   Usability       images@tokowa.at        
$2y$10$6sT5RBrIV3k.smgo.3W4OeefmSQwXmnRtOIVicvzh1MY6tZlBZEpO    
5e39da192b20493a8c2e5e5c6f56c347        t       2022-06-02 
21:56:02.588657      2022-06-02 21:56:02.588657
12      Manuel  Manuel  lasvegas2400@gmail.com  
$2y$10$XnpfGhSWDOeuBiQ0hmXGMeovKy/sPz9O85qEVk0vENY2RUWuikGfW    
995839e618d48a98570c467833b31ab8        t       2022-06-03 
10:32:18.453072      2022-06-03 10:32:18.453072
13      DenslWashington Denis Stjepanovic       
stjepanovic.dns@gmail.com       
$2y$10$mcKrU.dd9eXlyyyUUHHsyONCw7FRTdI3/iZEDn.zOI/xNStAWhz/.    
9055b1e6490d3f36ee7dd7fa92d53ce3        t       2022-06-03 
10:38:49.66798       2022-06-03 10:38:49.66798
14      joe     johannes handlechner    
johannes-handlechner@outlook.com        
$2y$10$FDLKAgYIjaCO2QRADoHk5uWquOcJAJx8oVjq6t6j3WelwFjpLdd8m    
f3b5317217975d7526e2d1574cdd7be0        t       2022-06-03 
10:43:16.352914      2022-06-03 10:43:16.352914
15      norviuser1      Oli     
onutzenberger.mmt-b2021@fh-salzburg.ac.at       
$2y$10$3bKUMyq4OBRjXVvViQTWsOd6Qs0gp9q9bA6PEo3.hO/Woz1shavre    
422a136619385f8d9146d1b9a1e9846e        t       2022-06-03 
11:08:20.370758      2022-06-03 11:08:20.370758
16      araz    araz    fhs41238@fh-salzburg.ac.at      
$2y$10$FisKTrL/4XMmDOuRVxdxEu9KgXNPfNCrql8SUnAM2P4PaUgPI55.q    
fff905ecf97cfcbeef2e1128736d3f68        t       2022-06-07 
14:48:20.48984       2022-06-07 14:48:20.48984
17      bjelline        Brigitte Jellinek       bjelli@gmail.com        
$2y$10$o5KdR8zI8wPAGa3P4B/userv96LRAgZOevYvvcAD6lXzhyfNPDvrS    
aea12d36459d85e9782ba27e934dbddb        t       2022-06-13 
13:32:35.699678      2022-06-13 13:32:35.699678
18      konsti  konsti  images@†okowa.at        
$2y$10$/b3ULkuUynAVyLAqn1BV..wYvLj0.oA10MYjGl/YL.jMWEtoHD1s6    
a434b66c163b384bdf0f17ba6acbbacd        f       2022-11-04 
16:56:23.656723      2022-11-04 16:56:23.656723
\.


--
-- Name: users_user_id_seq; Type: SEQUENCE SET; Schema: public; 
Owner: fhs44559
--

SELECT pg_catalog.setval('public.users_user_id_seq', 19, true);


--
-- Name: images_pkey; Type: CONSTRAINT; Schema: public; Owner: 
fhs44559
--

ALTER TABLE ONLY public.images
    ADD CONSTRAINT images_pkey PRIMARY KEY (image_id);

--
-- Name: users_email_key; Type: CONSTRAINT; Schema: public; Owner: 
fhs44559
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: users_name_key; Type: CONSTRAINT; Schema: public; Owner: 
fhs44559
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_name_key UNIQUE (name);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: 
fhs44559
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (username);


--
-- Name: images_image_owner_fkey; Type: FK CONSTRAINT; Schema: 
public; Owner: fhs44559
--

ALTER TABLE ONLY public.images
    ADD CONSTRAINT images_image_owner_fkey FOREIGN KEY (image_owner) 
REFERENCES public.users(username);


--
-- Name: likes_fk_image_id_fkey; Type: FK CONSTRAINT; Schema: public; 
Owner: fhs44559
--

ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_fk_image_id_fkey FOREIGN KEY (fk_image_id) 
REFERENCES public.images(image_id);


--
-- Name: likes_fk_image_owner_fkey; Type: FK CONSTRAINT; Schema: 
public; Owner: fhs44559
--

ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_fk_image_owner_fkey FOREIGN KEY 
(fk_image_owner) REFERENCES public.users(username);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
--
-- PostgreSQL database dump complete
--
