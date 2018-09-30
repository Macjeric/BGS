import Vue from 'vue';
import Chart from 'chart.js';

export default Vue.extend({
    template: `
        <div>
            <canvas width="40px" height="20px" v-el:canvas></canvas>
            {{{ legend }}} 
        </div>
    `,

    props: ['keys', 'values'],

    data() {
        return {
            legend: ''
        };
    },

    ready(){
        this.render({
            labels: this.keys,
            datasets: [
                {
                    label: "Amount",
                    backgroundColor: "green",
                    fillColor: "#f948c1",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "black",
                    pointHighlightFill: "black",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: this.values
                }
            ]
        });
    },

    methods: {
        render(data) {
            new Chart(this.$els.canvas.getContext('2d') , {
                type: "line",
                data: data, 
            });
    
            this.legend = chart.generateLegend();
        }
    }
});