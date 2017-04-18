<html>
<head>
    <title>vue</title>
    <meta id="token" name="token" value="{{ csrf_token() }}">
</head>
<body>

<div id="app" style="font-size: 16px;height: 10px;background: #fff;">

    <task-app></task-app>

    <template id="task-template">
        <form @submit="createBanner">
                <input type="text" v-model="note">
                <button type="submit">create</button>
        </form>

        <div v-for="task in list | orderBy 'id' -1">@{{task.title}}
            <button @click="deleteBanner(task)">删除</button>
        </div>

    </template>
</div>
<script src="{{asset('/vue.js')}}"></script>
<script src="{{asset('/vue-resource.min.js')}}"></script>

<script>
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
    var resource = Vue.resource('test/{id}');
    Vue.component('task-app', {
        template: '#task-template',
        data: function () {
            return {
                note: '',
                list: [],
                files: [
                ]
            }
        },
        created: function () {
            var vm = this;
            this.$http.get('{{url('/test')}}').then((response) => {
                vm.list = response.data;
            }, (response) => {
                console.info("error");
            });
        },
        methods: {
            createBanner: function (e) {
                e.preventDefault();
                this.$http.post('{{url('/test')}}', {title: this.note}, function (respones) {
                    this.list.push(respones.banner);
                    console.log(respones);
                }.bind(this))
            },
            deleteBanner: function (task) {
                resource.delete({id: task.id}, function (response) {
                    console.log(response);
                })
                this.list.$remove(task);
            }
        }
    })
    new Vue({
        el: "#app"
    });
</script>
</body>
</html>