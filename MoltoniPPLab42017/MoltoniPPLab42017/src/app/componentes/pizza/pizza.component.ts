import { Component, OnInit,Input} from '@angular/core';
import {Pizza} from '../../clases/pizza'
@Component({
  selector: 'app-pizza',
  templateUrl: './pizza.component.html',
  styleUrls: ['./pizza.component.css']
})
export class PizzaComponent implements OnInit {
  @Input() public pizza:Pizza;
  constructor() { }

  ngOnInit() {
  }

}
