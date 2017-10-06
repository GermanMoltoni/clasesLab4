import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validator, Validators } from '@angular/forms';
import {Pizza} from '../../clases/pizza';
import {ServicioPizzaService} from '../../servicios/servicio-pizza.service'

@Component({
  selector: 'app-registro-pizza',
  templateUrl: './registro-pizza.component.html',
  styleUrls: ['./registro-pizza.component.css']
})
export class RegistroPizzaComponent implements OnInit {
  public registrarPizza:Pizza;
  constructor(private builder: FormBuilder,private pizzaService:ServicioPizzaService) { }
  sabor = new FormControl('', [
    Validators.required
  ]);
  cantidad = new FormControl('', [
    Validators.required 
  ]);
  tipo = new FormControl('',[
    Validators.required
  ])
  pathFoto = new FormControl('',[
    Validators.required
  ])
  formRegistro: FormGroup = this.builder.group({
    sabor: this.sabor,
    cantidad: this.cantidad,
    tipo: this.tipo,
    pathFoto : this.pathFoto
});
  ngOnInit() {
  }
  CrearPizza(){
    let sabor = this.formRegistro.get('sabor').value;
    let tipo = this.formRegistro.get('tipo').value;
    let cantidad = this.formRegistro.get('cantidad').value;
    let pathFoto = this.formRegistro.get('pathFoto').value;
    let pizza = new Pizza(sabor,cantidad,tipo,pathFoto);
    this.registrarPizza = pizza;
     this.pizzaService.CrearPizzaService(pizza);
  }

}
