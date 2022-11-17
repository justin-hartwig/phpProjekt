import { each } from 'lodash';
import './bootstrap';

$(document).ready(function(){
    $(document).on('keyup', '#search', function(e){
        let value = $(this).val();
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
        type: "GET",
            url: "search",
            data: {"search": value},
            dataType: "json",
            success:function(result){
                let htmlEntrys = '';
                if(result.entrys == 0) {
                    htmlEntrys += "<p>Kein Eintrag gefunden.</p>"
                } else {
                    result.entrys.forEach((entry)=> {
                        if(entry.released == 1) {
                            htmlEntrys += 
                            `<div class="col-12 col-md-6">
                                <div class="book-entry">
                                    <a href="/Eintraege/`+entry.id+`">
                                        <h2>`+entry.title+`</h2>`
                            result.users.forEach((user)=>{
                                if(user.id == entry.user_id){
                                    htmlEntrys += `<p>`+user.name+`</p>`
                                }
                            })
                            htmlEntrys += 
                                        `<p>`+entry.text+`</p>
                                    </a>
                                </div>
                            </div>`
                        }
                    })
                }
                $('.book-entrys').html(htmlEntrys);
            }
        })
    })
})