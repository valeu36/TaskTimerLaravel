<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form>
                        <input type="text" v-model="taskName">
                        <button type="submit" @click.prevent="onSubmit">Submit</button>
                    </form>
                </div>

                <div class="card mt-5">
                    <button @click="onGetData()">Get data</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import api from '../api';
    export default {
    	data() {
    		return {
    			taskName: '',
                userId: 1
            }
        },
        // mounted() {
        // 	this.test();
        //     console.log('Component mounted.')
        // },
        methods: {
        	// async test() {
        	// 	try {
        	// 	    const {data} = await api.index('/tasks');
        	// 	    console.log(data);
            //     } catch (e) {
        	// 		console.log(e);
            //     }
            // },
            async onSubmit() {
        		try {
        			console.log(this.taskName);
                    await api.store('/tasks', {
						start_time: new Date().toISOString().slice(0, 19).replace('T', ' '),
					    user_id: this.userId,
					    task_name: this.taskName,
                    });
                } catch (e) {
                    console.log(e);
				}
            },
            async onGetData() {
        		try {
        			const {data} = await api.index('/tasks');
                    console.log(data)
                } catch (e) {
        			console.log(e);
                }
            }
        }
    }
</script>
