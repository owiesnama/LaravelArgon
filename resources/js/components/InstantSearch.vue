<template>
    <ais-index class="position-relative"
               app-id="XS1OZ4YM2R"
               api-key="f6313b8943de3f0ab509253fa19ca43b"
               index-name="users">

        <ais-search-box :placeholder="placeholder" class="form-control"></ais-search-box>


        <div class="card card-search" v-show="isSearching">
            <ul class="list-group">
                <ais-results>

                    <template slot-scope="{ result }">
                        <li class="list-group-item list-group-item-flex">
                              <span class="avatar avatar-sm rounded-circle">
                                <img :src="result.avatar ||
                                      'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaz8TR-QMmFtVKPImeFRoSHy1pZwHIvdBQ7gu5cHpWeS8H8lla'">
                              </span>
                            <ais-highlight :result="result" attribute-name="name"></ais-highlight>
                        </li>

                    </template>
                </ais-results>
            </ul>
        </div>

    </ais-index>
</template>
<script>
    export default{
        props: ['placeholder'],


        data(){
            return {
                query: ''
            }
        },

        computed: {
            isSearching(){
                return false
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
    }

    .card-search {
        position: absolute;
        z-index: 1;
        top: 110%;
        left: 15%;
        transform: translateX(-10%);
        width: 300px;
        height: auto;
        -webkit-box-shadow: 1px 1px 3px rgb(220, 220, 220);
        -moz-box-shadow: 1px 1px 3px rgb(220, 220, 220);
        box-shadow: 1px 1px 3px rgb(220, 220, 220);
    }

</style>