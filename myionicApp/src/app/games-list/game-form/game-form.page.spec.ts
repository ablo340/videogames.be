import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GameFormPage } from './game-form.page';

describe('GameFormPage', () => {
  let component: GameFormPage;
  let fixture: ComponentFixture<GameFormPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GameFormPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GameFormPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
