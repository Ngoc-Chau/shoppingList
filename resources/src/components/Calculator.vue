 <template>
 <div class="container">
  <div class="calculator">
    <div class="screen">
      <div class="display">{{current || '0'}}</div>
      <div class="previous">{{previous || '(0)'}}{{calculator || ''}}{{next || ''}}</div>
    </div>
    <button @click.prevent="clear" class="btn">C</button>
    <button @click.prevent="del" class="btn">CE</button>
    <button @click.prevent="percent" class="btn">%</button>
    <button @click.prevent="divide" class="btn operator">÷</button>
    <button @click.prevent="append('7')" class="btn">7</button>
    <button @click.prevent="append('8')" class="btn">8</button>
    <button @click.prevent="append('9')" class="btn">9</button>
    <button @click.prevent="times" class="btn operator">x</button>
    <button @click.prevent="append('4')" class="btn">4</button>
    <button @click.prevent="append('5')" class="btn">5</button>
    <button @click.prevent="append('6')" class="btn">6</button>
    <button @click.prevent="minus" class="btn operator">-</button>
    <button @click.prevent="append('1')" class="btn">1</button>
    <button @click.prevent="append('2')" class="btn">2</button>
    <button @click.prevent="append('3')" class="btn">3</button>
    <button @click.prevent="add" class="btn operator">+</button>
    <button @click.prevent="sign" class="btn">+/-</button>
    <button @click.prevent="append('0')" class="btn zero">0</button>
    <button @click.prevent="dot" class="btn">.</button>
    <button @click.prevent="equal" class="btn operator">=</button>
  </div>
 </div>
</template>

<script>
export default {
  data() {
    return {
      previous: null,
      calculator: '',
      next: null,
      current: '',
      operator: null,
      operatorClicked: false,
    }
  },

  methods: {
    clear() {
      this.current = '';
      this.previous = null;
      this.calculator = '';
      this.next = null;
    },
    del() {
      this.current = this.current.slice(0, -1);
    },
    percent() {
      this.current = parseFloat(this.current) / 100;
    },
    sign() {
      this.current = this.current.charAt(0) === '-' ? 
        this.current.slice(1) : `-${this.current}`;
    },
    dot() {
      if (this.current.indexOf('.') === -1) {
        this.append('.');
      }
    },
    append(number) {
      if (this.operatorClicked) {
        this.current = '';
        this.operatorClicked = false;
      }
      this.current = `${this.current}${number}`;
    },
    setPrevious() {
      this.previous = this.current;
      this.operatorClicked = true;
    },
    divide() {
      if (this.current == '') {
        this.current = 0;
      }
      this.operator = (a, b) => a / b;
      this.setPrevious();
      this.calculator = '/';
    },
    times() {
      if (this.current == '') {
        this.current = 0;
      }
      this.operator = (a, b) => a * b;
      this.setPrevious();
      this.calculator = 'x';
    },
    minus() {
      if (this.current == '') {
        this.current = 0;
      }
      this.operator = (a, b) => a - b;
      this.setPrevious();
      this.calculator = '-';
    },
    add() {
      if (this.current == '') {
        this.current = 0;
      }
      this.operator = (a, b) => a + b;
      this.setPrevious();
      this.calculator = '+';
    },
    equal() {
      this.next = this.current;
      this.current = `${this.operator(
        parseFloat(this.previous),
        parseFloat(this.current)
      )}`;
    }
  }
}
</script>

<style scoped>
.container {
  margin: 0 auto;
  width: 330px;
  height: 380px;
  background-color: rgb(192, 129, 129);
}
.calculator {
  margin: 0 auto;
  padding-top: 15px;
  width: 300px;
  font-size: 40px;
  text-align: center;
  display: grid;
}
.screen {
  grid-column: 1 / 5;
  background-color: #333;
  text-align: right;
  margin-bottom: 10px;
  padding: 10px 10px 10px 0;
}
.display {
  color: white;
}
.previous {
  font-size: 20px;
  text-align: right;
  color: #919191;
}
.btn {
  background-color: #000000;
  color: white;
  border: 1px solid #999;
  height: 50px;
  font-size: 20px;
}
.operator {
  background-color: #333;
  color: white;
}
</style>