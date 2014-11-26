$(document).ready(function(){
    //На страната lectureView сите прашања се листаат во <ul> листа
    // Секое прашање се наоѓа во <li> таг со класа .lecture-question
    //види lectureView.php линија 116
    var questionsInLecture=$(".lecture-question");
    for(var i=0;i<questionsInLecture.length;i++){
        var oneQuestion=questionsInLecture[i];
        //копчето си има своја класа activate-q-btn или deactivate
        //види activateQuestions.php линии 5 и 11
        var activateBtn=$(oneQuestion).find(".activate-q-btn");
        var deactivateBtn=$(oneQuestion).find(".deactivate-q-btn");
        //на клик на копчето Активирај
        activateBtn.click(function(){
            //најди кое е id-то на прашањето кое за кое одговара ова копче
            //id-то на прашаето се поставува како data-id својство
            //во датотеката activateQuestions.php линии 5 и 11 (троа понатаму во линијата)
            var questionId=$(this).data("id");

            //ајакс повик
            //url: која страница ја повикуваме
            $.ajax({ url: '/SArS/ajax/questions.php',
                //шо податоци праќаме, асоцијативна низа
                data: {action: 'activate',id:questionId},
                //праќаме преку метод:
                type: 'post',
                //ако повикот бил успешен се извршува ова
                success: function(output) {
                    //output е тоа што страницата која ја повикуваме го печати,
                    //у наш случај тоа е само id-то на прашањето
                    //види questions.php линии 9 и 14
                    var id=parseInt(output);
                    if(!isNaN(id)){
                        //ако id e број, успешно е завршено
                        //се деактивира едното копче се активира другото
                        $(".activate-q-btn[data-id="+id+"]").prop("disabled","true");
                        $(".deactivate-q-btn[data-id="+id+"]").prop("disabled","");
                        alert("Прашањето е активирано");
                    }else{
                        alert("Грешка при активирање на прашањето");
                    }
                }
            });
        });
        deactivateBtn.click(function(){
            var questionId=$(this).data("id");
            $.ajax({ url: '/SArS/ajax/questions.php',
                data: {action: 'deactivate',id:questionId},
                type: 'post',
                success: function(output) {
                    var id=parseInt(output);
                    if(!isNaN(id)){
                        $(".deactivate-q-btn[data-id="+id+"]").prop("disabled","true");
                        $(".activate-q-btn[data-id="+id+"]").prop("disabled","");
                        alert("Прашањето е деактивирано");
                    }else{
                        alert("Грешка при деактивирање на прашањето");
                    }
                }
            });
        });

    }
});