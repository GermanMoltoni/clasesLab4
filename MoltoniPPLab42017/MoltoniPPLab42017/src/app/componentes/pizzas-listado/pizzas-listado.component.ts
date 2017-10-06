import { Component, OnInit ,Output,EventEmitter} from '@angular/core';
import { Validators, FormBuilder, FormControl, FormGroup } from '@angular/forms';
import {ServicioPizzaService} from '../../servicios/servicio-pizza.service'
import {Pizza} from '../../clases/pizza';
@Component({
  selector: 'app-pizzas-listado',
  templateUrl: './pizzas-listado.component.html',
  styleUrls: ['./pizzas-listado.component.css']
})
export class PizzasListadoComponent implements OnInit {

  constructor(private pizzaService:ServicioPizzaService) { }
  public pizzas:Pizza[];
  ngOnInit() {
    this.pizzaService.ListarPizzas().then(per=>{this.pizzas=per;})
  }


}
