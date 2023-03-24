$(function(){

        /*
          Clicar e ir para div de contato com base no atributo goto
        */
        var directory = 'htdocs/Front_End/Projetos_HTML/Projeto_05'
        
        $('[goto=contato]').click(function(){
            $('html,body').animate({'scrollTop':$('#contato').offset().top});
            //location.href=directory+'?contato';
            return false;
        });

        checkUrl();


        function checkUrl(){
            var url = location.href.split('/');
            var curPage = url[url.length-1].split('?');
       
            if(curPage[1] != undefined && curPage[1] == 'contato'){
              $('header nav a').css('color','black');
              $('footer nav a').css('color','white');
              $('[goto=contato]').css('color','#EB2D2D');
              $('html,body').animate({'scrollTop':$('#contato').offset().top});
            }else{
              if(curPage[0] == '')
                $('a[href=home]').css('color','#EB2D2D');
              else
                $('a[href='+curPage[0]+']').css('color','#EB2D2D');
            }

        }

        /*
            menu responsivo
        */


        $('.mobile').click(function(){
            $(this).find('ul').slideToggle();
        })

        /*
          Sistema de navegacao nos depoimentos da index.html
        */

        var amtDepoimento = $('.depoimento-single p').length;
        var curIndex = 0;

        iniciarDepoimentos();
        navegarDepoimentos();

        function iniciarDepoimentos(){
            $('.depoimento-single p').hide();
            $('.depoimento-single p').eq(0).show();
        }

        function navegarDepoimentos(){
            $('[next]').click(function(){
                 curIndex++;
                 if(curIndex >= amtDepoimento)
                    curIndex = 0;
                $('.depoimento-single p').hide();
                $('.depoimento-single p').eq(curIndex).show();
                
            })

            $('[prev]').click(function(){
                curIndex--;
                 if(curIndex < 0)
                    curIndex = amtDepoimento-1;
                $('.depoimento-single p').hide();
                $('.depoimento-single p').eq(curIndex).show();
            })
        }

})