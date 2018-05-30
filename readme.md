Fifa Ultimate Card Trader

1.Git repo:

2.What is the app supposed to do?
It's a card trading app based on the popular game fifa, where you can view all the players in the world and collect them. Before you are logged in/ registered you can view the homepage with a little bit explanation. You can also see the players that you can try to collect, on this tab you can filter the players, show more players, order them or search a player by name. In the next tab you can see the leaderboard, the player with the most coins is on top. For the next section you need to be logged in, then you can see my cards, the market and open packs. On open packs you can open each 180 minutes a pack with five cards. These cards are added to my cards. When you go to this page you can click on a player and view all his abilities. You can also choose to sell it. When you sell it, the player is added to the transfer market where you can bid or buy the player in realtime (vuejs + fetch). The players you buy are added to my cards. Try it out.

The app is made with laravel (php) and mysql. The responsive html, css is made with bootstrap. I also added vuejs and fetch to make the market. The manifest is added. For the serviceworker I made the site https which is more secure.

3..App hosted: https://jordytack.be

4.Security headers: https

5.Webpack: I used the standard webpack from laravel 

6.Other info: The site only caches the homepage, players, leaderboard and my cards because the other pages are to much dependant on internet connection. 
The site is hosted in two parts, the futapp and public_html because it's made with laravel, that's why there are two folders
I made three video's, one showing the website, one showing the mobile version and one especially for service worker