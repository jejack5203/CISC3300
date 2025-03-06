function createCounter() {
  let c = 5;
  function totalCount() {
    console.log(c);
  }
  c++;
  c++;
  return totalCount;
}

const counter = createCounter();
counter();
counter();