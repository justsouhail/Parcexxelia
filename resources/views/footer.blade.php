<footer>
                <div class="footercontent">
                <h3><span ><img src="/images/favicon-exxelia.png" alt="" style="width: 39px; height: 39px;" id="ex" ></span> <span>ParcInfo</span></h3>
                    <p>À propos de l'application ParcInfo développée par souhail AROUD pour Exxelia,
                         cette solution permet à la société de surveiller de manière proactive son parc informatique.
                         Avec une interface conviviale et des fonctionnalités avancées,
                          cette application offre une expérience utilisateur optimale pour assurer une surveillance efficace des systèmes informatiques de l'entreprise.  </p>
                          
               
                <ul class="list">
                    <li><a href="mailto:souhailaroud09@gmail.com us">Contact</a></li>
                    <li><a href="https://exxelia.com/en/" target="_blank">Exxelia</a></li>
                </ul>
                </div>
                <div class="footer-bottom">
                   <div>
                   <p>Copyright &copy;2023 ParcInfo . Developped by <span>Souhail AROUD</span> </p>
                   </div>
                </div>
</footer>

<style>
   footer{
    margin-left: 350px;
    background-color: #083C47;
    
    font-family: 'Poppins', sans-serif;
    padding-top: 20px;
   
    /* margin-top: auto; */
    color: white;
    bottom: 0;
    
   }
   .footercontent{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
   }
   .footercontent h3{
    font-size:1.8rem ;
    font-weight: 400;
    text-transform:capitalize ;
    vertical-align: middle;
    line-height: 3rem;
   }
   #ex{
    vertical-align: middle;
   }
   .footercontent p{
        max-width: 900px;
        margin: 10px auto;
        line-height: 28px;
        font-size: 14px;
   }

   .list{
        list-style: none;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1rem 0 3rem 0;
   }
   .list li {
        margin: 0 10px;
   }
   .list a{
    text-decoration: none ;
    color: white;
   }
   .list a:hover{
    color: #20A364;
   }
   .footer-bottom{
    background-color:#03191D;
   
    padding: 10px 0;
    padding-left: 400px;
    
   }
   .footer-bottom  p {
    font-size: 14px;
    word-spacing: 2px;
    text-transform: capitalize;
   }
   .footer-bottom span{
    text-transform: uppercase;
    opacity: .4;
    font-weight: 200;

   }




   #menu-toogle:checked ~ footer{
    margin-left: 70px;
   }
   #menu-toogle:checked ~ footer .footer-bottom  p{
        padding-left: 100px;
      
   }
   @media only screen and (max-width:1500px){
        footer{
            margin-left: 70px;
        }  
        /* footer .footer-bottom  p{
           padding-right: 290px;
           min-width: 1000px;
        } */
        footer .footer-bottom {
            align-items: center;
        }
    }
   @media only screen and (max-width:980px){
        footer{
            margin-left: 70px;
        }  
        /* footer .footer-bottom  p{
           padding-right: 790px;
           min-width: 1000px;
        } */
        footer .footer-bottom {
            align-items: center;
        }
       
   }
   @media only screen and (max-width:680px){
        footer{
            margin-left: 70px;
        }  
        /* footer .footer-bottom  p{
           padding-right: 990px;
           min-width: 1000px;
        } */
        footer .footer-bottom {
            align-items: center;
        }
   }
</style>