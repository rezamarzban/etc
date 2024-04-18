from flask import Flask, render_template
from flask_socketio import SocketIO, emit
import subprocess

app = Flask(__name__)
socketio = SocketIO(app)

octave_process = None

def start_octave():
    global octave_process
    octave_process = subprocess.Popen(['octave', '--persist'], stdin=subprocess.PIPE, stdout=subprocess.PIPE, stderr=subprocess.PIPE)

def send_to_octave(command):
    octave_process.stdin.write(command.encode() + b'\n')
    octave_process.stdin.flush()

def read_from_octave():
    return octave_process.stdout.readline().decode()

@app.route('/')
def index():
    return render_template('index.html')

@socketio.on('command')
def handle_command(command):
    send_to_octave(command)
    output = read_from_octave()
    emit('output', output)

if __name__ == '__main__':
    start_octave()
    app.debug = True  # Set Flask into debug mode
    socketio.run(app)
