<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <input v-model="data" type="text" name="text">
                    <button type="submit" @click="onSubmit(data)">Submit</button>
                </div>

                <div class="card">
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
    			data: '',
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
            async onSubmit(data) {
        		try {
        			console.log(data);
                    await api.store('/tasks', {
						start_time: this.startTime,
					    user_id: 2,
					    task_name: this.data,
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
