<template>
    <b-container>
        <div class="pt-4">
            <b-button v-b-modal.modal-add-task variant="info">New Task</b-button>
        </div>
        <b-alert class="mt-2" v-if="status=='success'" show dismissible :variant="variant">{{ message }}</b-alert>

        <div>

            <b-table show-empty class="mt-2" head-variant="light" bordered hover :fields="fieldsTask" :items="tasks"
                     empty-html="<p class='text-center'>The tasks is empty !</p>">
                <template #cell(action)="row">
                    <b-button size="sm" @click="row.toggleDetails">{{ row.detailsShowing ?'Hide':'View'}}</b-button>
                </template>

            </b-table>
        </div>


        <b-modal id="modal-add-task" hide-footer size="lg" title="Add new task">
            <b-alert v-if="status=='error'" show dismissible :variant="variant">{{ message }}</b-alert>
            <b-form @submit.prevent="addTask">
                <b-form-input v-model="title" required placeholder="Title task . . ."></b-form-input>
                <b-form-textarea class="mt-2" v-model="description" required
                                 placeholder="Description task . . ."></b-form-textarea>
                <hr>
                <h5>Tags :</h5>
                <b-form-checkbox-group class="mt-2">
                    <b-form-checkbox class="col-3" v-for="option in optionTags" v-model="tags" :key="option.value"
                                     :value="option.value">{{ option.text }}
                    </b-form-checkbox>
                </b-form-checkbox-group>
                <b-button class="mt-2 float-right" type="submit" variant="info">Save Task</b-button>
            </b-form>
        </b-modal>
    </b-container>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            title: '',
            description: '',
            message: '',
            variant: 'danger',
            status: '',
            tags: [],
            optionTags: [],
            fieldsTask: [
                {key: 'title', label: 'Title', sortable: true},
                {key: 'description', label: 'Description', sortable: true},
                {key: 'status', label: 'Status', sortable: true},
                {key:'action',label: 'Action'},
            ],
            tasks: []
        }
    },
    mounted() {
        axios.get('/api/tag')
            .then((res) => {
                var self = this
                res.data.forEach((result) => {
                    let tag = {
                        value: result.id,
                        text: result.name
                    };
                    self.optionTags.push(tag)
                })
            })


        axios.get('/api/task')
            .then((res) => {
                var self = this
                res.data.forEach((result) => {
                    let task = {
                        title: result.title,
                        description: result.description,
                        status: result.status?'done':'pending',
                        action:''
                    };
                    self.tasks.push(task)
                })
            })

    }
    ,
    methods: {
        addTask() {
            let task = {
                title: this.title,
                description: this.description,
                tags: this.tags
            };
            axios.post('/api/task/', task).then((res) => {
                if (res.data.status == 'success') {
                    this.$bvModal.hide('modal-add-task')
                    this.variant = 'success';
                }
                this.message = res.data.message;
                this.status = res.data.status;
                var self = this;
                setTimeout(function () {
                    self.status = '';
                    self.message = '';
                }, 2000)
            })
        }
    }
}
</script>

<style scoped>

</style>
