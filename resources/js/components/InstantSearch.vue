<template>
    <ais-index class="position-relative"
               app-id="XS1OZ4YM2R"
               api-key="f6313b8943de3f0ab509253fa19ca43b"
               index-name="users">

        <ais-input placeholder="Find products..."
                   class="form-control"
                   @query="showResults"
                   :placeholder="placeholder"></ais-input>



        <div class="card card-search" v-show="isSearching">
            <ul class="list-group">

                <ais-no-results>
                    <template slot-scope="props">
                        <li class="list-group-item" v-text="noResultPlaceholder"><i>{{ props.query }}</i>.</li>
                    </template>
                </ais-no-results>
                <ais-results :results-per-page="5">

                    <template slot-scope="{ result }">
                        <li class="list-group-item list-group-item-flex">
                              <span class="avatar avatar-sm rounded-circle">
                                <img :src="result.profile.avatar ||
                                      'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaz8TR-QMmFtVKPImeFRoSHy1pZwHIvdBQ7gu5cHpWeS8H8lla'">
                              </span>
                            <ais-highlight :result="result" attribute-name="name"></ais-highlight>
                        </li>

                    </template>
                </ais-results>
                <ais-stats class="text-muted
"></ais-stats>
                <ais-powered-by class="list-group-item"></ais-powered-by>
            </ul>
        </div>



    </ais-index>
</template>
<script>
    export default{
        props: ['placeholder','noResultPlaceholder'],


        data(){
            return {
                isSearching:false
            }
        },

        methods:{
            showResults(query){
                if (query.length >= 1){
                    this.isSearching = true
                }
                else {
                    this.isSearching = false
                }
            }
        }
    }
</script>
<style>
    .ais-input {
        width: 270px;
        background-color: transparent;
        color: hsla(0, 0%, 100%, .9);
        padding-left: 0;
        line-height: 20px;
        box-shadow: none;
        position: relative;
        border: none;
        flex: 1 1 auto;
        margin-bottom: -5px;
        outline: none;
    }

    .ais-input::placeholder {
        color: hsla(0, 0%, 100%, .9);
    }

    .ais-search-box__submit, .ais-clear {
        display: none;
    }

    .position-relative {
        position: relative;
    }

    .list-group-item.list-group-item-flex{
        display: flex;
        align-content: center;
        border:none;
        border-radius:0;
    }
    .list-group-item.list-group-item-flex:hover{
        border: none;
        border-radius:0;
    }

    .card-search {
        position: absolute;
        z-index: 1;
        top: 110%;
        left: 14%;
        transform: translateX(-10%);
        width: 300px;
        height: auto;
        -webkit-box-shadow: 1px 1px 3px rgba(150, 150, 150,.8);
        -moz-box-shadow: 1px 1px 3px rgba(150, 150, 150,.8);
        box-shadow: 1px 1px 3px rgba(150, 150, 150,.8);
        border: none;
    }

</style>