/// <reference path="vue.js" />

var apiURL = '/api'

var app = new Vue(
    {
        el: '#market',
        data: {
            message: 'Loading players...',
            players: null,
            currentPlayer: "",
            isReadOnly: true,  
            isNew: false,
            firstTime: null,
            remTime:null,
            buy: false,
            buybidtext: null,
            inputtext: null,
        },
        created: function () {
            var self = this;
            this.fetchPlayers();
            this.minTime();
           
        },
        methods: {
            
            fetchPlayers: function () {
                self = this;
                                fetch(`${apiURL}/players`,{
                       method: 'get',
                       credentials: "same-origin",
                       
                     })
                    .then(res => res.json())
                    .then(function (players) {
                        
                       players.forEach(function (player, i) {
                            player.isActive = false;
                        });
                        self.players = players;
                        self.message = 'Overview';
                        
                        if (self.players.length > 0) {
                            self.fetchPlayerDetails(self.players[0]);
                            self.firstTime = self.getRemainingTime(self.players[0]);
                        }
                        
                    })
                    .catch(err => console.error('Error: ' + err));
            },
            
            fetchPlayerDetails: function (player) {
                self = this;
                fetch(`${apiURL}/players/${player.id}`,{
                       method: 'get',
                       credentials: "same-origin",
                       
                     })
                    .then(res => res.json())
                    .then(function (res) {
                        self.currentPlayer = res;/*
                        time = self.getRemainingTime(res);
                        hours = Math.floor(time / 3600);
                        time %= 3600;
                        minutes = Math.floor(time / 60);
                        seconds = time % 60;
                        self.currentPlayer.remainingTime = hours+" Hours "+minutes+" Mins "+Math.floor(seconds) + " Secs";*/
                        self.players.forEach(function (player, i) { player.isActive = false; })
                        player.isActive = true;
                    })
                    .catch(err => console.error('Error: ' + err));
            },

            getPlayerClass: function (player) {
                if (player.isActive) return 'activate';
                return '';
            },
            getRemainingTime: function(player){
                var currentdate = new Date(); 
                var datetime = currentdate.getFullYear() + '-'
                + (currentdate.getMonth()+1)  + '-' 
                 + currentdate.getDate() + ' '
                
                  
                + currentdate.getHours() + ':'  
                + currentdate.getMinutes() + ':' 
                + currentdate.getSeconds();

              var timeremaining = new Date(player.remainingTime);
                    var totaal = Math.abs((timeremaining-currentdate)/1000);
                    timeFirst = totaal;
                return totaal;
             },
          
             buyCurrentPlayer: function(){
                var self = this;

               
               
                var ajaxConfig = {
                    method: 'post',
                    credentials: "same-origin",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                      },
                    body: JSON.stringify({'cardid':self.currentPlayer.cardId,'transferid':self.currentPlayer.id,'buynowprice':self.currentPlayer.buyNowPrice,'userid':self.currentPlayer.userid}),
                    
                }
                // save: new or update
               
             
                    var myRequest = new Request(`${apiURL}/players`, ajaxConfig);
                
                fetch(myRequest)
                    .then(res => res.text())
                    .then(function (res) {
                        self.message = "Congratulations with your purchase. You can see your player in My Cards."
                        self.fetchPlayers();
                    })
                   .catch(err => console.error('Error: ' + err));
             },
             bidCurrentPlayer: function(){
                var self = this;

               
               
                var ajaxConfig = {
                    method: 'put',
                    credentials: "same-origin",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                      },
                    body: JSON.stringify({'bidprice':self.inputtext,'transferid':self.currentPlayer.id}),
                    
                }
                // save: new or update
               
             
                    var myRequest = new Request(`${apiURL}/players`, ajaxConfig);
                if(self.inputtext>self.currentPlayer.bidPrice&&self.inputtext>=self.currentPlayer.startPrice&&self.inputtext<self.currentPlayer.buyNowPrice){
                    fetch(myRequest)
                        .then(res => res.text())
                        .then(function (res) {
                           
                            //self.fetchPlayers();
                            self.currentPlayer.bidPrice = self.inputtext;
                            self.message = "Your bid is succesfull"
                        })
                       .catch(err => console.error('Error: ' + err));
                   } else {
                       if(self.currentPlayer.bidPrice!==0){
                    self.message = "Your bid needs to be higher than "+self.currentPlayer.bidPrice+" and can't be higher than the buy now price";
                       } else {
                           self.message = "Your bid needs to be higher than "+self.currentPlayer.startPrice+" and can't be higher than the buy now price";
                       }
                   }
             },
             buyactive: function(){
                self = this;
                self.buy = true; 
                self.buybidtext = "Buy now for: "   
             },
             bidactive: function(){
                self = this;
                self.buy = false;
                self.buybidtext = "Bid: "      
             },
           
            deletePlayer: function (player) {
                self = this;

                // delete - ajax configuration
               // var ajaxHeaders = new Headers();
               // ajaxHeaders.append("Content-Type", "application/json", 'X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                var ajaxConfig = {
                    method: 'DELETE',
                    headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-Token": $('input[name="_token"]').val()
      },
                    credentials: "same-origin",
                     body: JSON.stringify({'bidderid':self.currentPlayer.bidderid,'transferid':self.currentPlayer.id,'userid':self.currentPlayer.userid,'bidprice':self.currentPlayer.bidPrice,'cardid':self.currentPlayer.cardId}),
                }
                var url = `${apiURL}/players/${player.id}`
                
                var myRequest = new Request(`${apiURL}/players/${player.id}`, ajaxConfig)
                
                fetch(myRequest)
                    //.then(res => res.json())
                    .then(res => console.log(res))
                    .then(function (res) {
                        
                        // remove player from list
                        self.players.forEach(function (player, i) {
                            if (player.id == self.currentPlayer.id) {
                                self.players.splice(i, 1);
                                return;
                            }
                        });
                        // select first player
                        if (self.players.length > 0)
                            self.fetchPlayerDetails(self.players[0]);
                    })
                    .catch(err => console.error('Error: ' + err));
            },

         
    minTime: function(){           
        this.interval = setInterval(function(){
            self = this;
            if(self.players.length>0){
                if(self.currentPlayer!==""){
                time = self.getRemainingTime(self.currentPlayer);
               
                        hours = Math.floor(time / 3600);
                        time %= 3600;
                        minutes = Math.floor(time / 60);
                        seconds = time % 60;
                        self.remTime = hours+" Hours "+minutes+" Mins "+Math.floor(seconds) + " Secs";
               }
            if(new Date(self.players[0].remainingTime)<new Date()){
                self.deletePlayer(self.players[0])
               self.fetchPlayers();
            } 
        }
        }.bind(this), 1000);
    }

        }
    });