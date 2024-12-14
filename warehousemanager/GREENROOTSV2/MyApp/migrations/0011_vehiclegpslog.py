# Generated by Django 5.1.3 on 2024-12-05 15:03

import django.db.models.deletion
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('MyApp', '0010_supplier_warehousedistribution_date_and_more'),
    ]

    operations = [
        migrations.CreateModel(
            name='VehicleGPSLog',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('timestamp', models.DateTimeField(auto_now_add=True)),
                ('speed', models.FloatField(blank=True, null=True)),
                ('altitude', models.FloatField(blank=True, null=True)),
                ('heading', models.FloatField(blank=True, null=True)),
                ('vehicle', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='gps_logs', to='MyApp.vehicle')),
            ],
            options={
                'ordering': ['-timestamp'],
            },
        ),
    ]
